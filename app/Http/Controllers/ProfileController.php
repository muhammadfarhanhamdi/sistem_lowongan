<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\PesertaMagangService;
use App\Models\PesertaMagangModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class ProfileController extends Controller
{
    protected $pesertaService;

    public function __construct(PesertaMagangService $pesertaService)
    {
        $this->pesertaService = $pesertaService;
    }

    public function index()
    {
        $user = Auth::user();
        $peserta = null;
        try {
            $peserta = PesertaMagangModel::where('id_user', $user->id)->first();
        } catch (\Throwable $e) {
            $peserta = null;
        }

        // load pendaftaran (applications) for this peserta so profile can show history
        $pendaftaran = collect();
        try {
            if ($peserta) {
                $pendaftaran = \App\Models\PendaftaranModel::with('lowongan')
                    ->where('id_peserta', $peserta->id)
                    ->orderBy('tanggal_daftar', 'desc')
                    ->get();
            }
        } catch (\Throwable $e) {
            $pendaftaran = collect();
        }

        // latest CV dokumen for profile display
        $latestCv = null;
        try {
            if ($peserta) {
                $dok = \App\Models\DokumenModel::where('id_peserta', $peserta->id)
                    ->where('jenis_dokumen', 'CV')
                    ->orderBy('tanggal_upload', 'desc')
                    ->first();
                if ($dok && $dok->file_path) {
                    $latestCv = $dok->file_path;
                }
            }
        } catch (\Throwable $e) {
            $latestCv = null;
        }

        return view('Public.User.profile', compact('peserta', 'pendaftaran', 'latestCv'));
    }

    public function save(Request $request)
    {
        $user = Auth::user();

        // ensure id_user present for validation rules
        $request->merge(['id_user' => $user->id]);
        // validate via service (reuses existing rules)
        $validated = $this->pesertaService->validatePesertaData($request, null);

        // handle CV upload if present: store file first, then create dokumen record after peserta created/updated
        $cvPublicPath = null;
        if ($request->hasFile('cv')) {
            try {
                Storage::makeDirectory('public/dokumen');
                $file = $request->file('cv');
                $path = $file->store('public/dokumen');
                $cvPublicPath = str_replace('public/', 'storage/', $path);
                Log::info('ProfileController: CV stored temporarily', ['user_id' => $user->id, 'path' => $path, 'public' => $cvPublicPath]);
            } catch (\Throwable $e) {
                Log::error('ProfileController: CV store failed', ['user_id' => $user->id, 'error' => $e->getMessage()]);
                $cvPublicPath = null;
            }
        }

        // Remove any file keys from the validated peserta payload to avoid inserting file paths into peserta table
        if (isset($validated['cv'])) unset($validated['cv']);

        // If peserta exists, update; otherwise create
        $peserta = PesertaMagangModel::where('id_user', $user->id)->first();
        if ($peserta) {
            $this->pesertaService->updatePeserta($peserta->id, $validated);
        } else {
            $peserta = $this->pesertaService->createPeserta($validated);
        }

        // if CV uploaded, create a dokumen record linked to peserta (dokumen table)
        if ($cvPublicPath && $peserta) {
            try {
                $dok = new \App\Models\DokumenModel();
                $dok->id_peserta = $peserta->id;
                $dok->jenis_dokumen = 'CV';
                $dok->file_path = $cvPublicPath;
                $dok->tanggal_upload = now();
                $dok->status = 1;
                $dok->save();
                Log::info('ProfileController: Dokumen record created for CV', ['user_id' => $user->id, 'dokumen_id' => $dok->id, 'file' => $cvPublicPath]);

                // notify admins using database notifications
                try {
                    $admins = \App\Models\User::where('id_role', 1)->get();
                    foreach ($admins as $admin) {
                        $admin->notify(new \App\Notifications\DokumenUploadedNotification($dok));
                    }
                } catch (\Throwable $nex) {
                    Log::error('ProfileController: Failed to notify admins', ['error' => $nex->getMessage()]);
                }

            } catch (\Throwable $e) {
                Log::error('ProfileController: Failed to create dokumen record', ['user_id' => $user->id, 'error' => $e->getMessage()]);
            }
        }

        return redirect()->route('profile')->with('success', 'Profil peserta berhasil disimpan.');
    }

    /**
     * Update basic account fields for authenticated user.
     */
    public function updateAccount(Request $request)
    {
        $user = Auth::user();
        $data = $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|max:100|unique:users,email,' . $user->id,
            'username' => 'nullable|string|max:50',
            'jurusan' => 'nullable|string|max:100',
            'pendidikan' => 'nullable|string|in:SMA,SMK,Diploma,Mahasiswa,Lainnya',
            'telepon' => 'nullable|string|max:20',
            'alamat' => 'nullable|string',
            // 'jabatan' omitted from profile update per UI decision
        ]);

        // assign
        $user->name = $data['name'];
        $user->email = $data['email'];
        if (array_key_exists('username', $data)) $user->username = $data['username'];
        if (array_key_exists('jurusan', $data)) $user->jurusan = $data['jurusan'];
        if (array_key_exists('pendidikan', $data)) $user->pendidikan = $data['pendidikan'];
        if (array_key_exists('telepon', $data)) $user->telepon = $data['telepon'];
        if (array_key_exists('alamat', $data)) $user->alamat = $data['alamat'];
        // jabatan not updated via profile UI

        $user->save();

        return redirect()->route('profile')->with('success', 'Akun berhasil diperbarui.');
    }

    /**
     * Handle avatar upload and save to user->avatar
     */
    public function storeAvatar(Request $request)
    {
        $user = Auth::user();
        $validated = $request->validate([
            'avatar' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048'
        ]);

        $file = $request->file('avatar');
        $path = $file->store('public/avatars');
        // convert to public path without 'public/' prefix
        $publicPath = str_replace('public/', 'storage/', $path);

        // delete old avatar if exists and stored in storage
        if ($user->avatar) {
            try {
                $old = str_replace('storage/', 'public/', $user->avatar);
                \Storage::delete($old);
            } catch (\Throwable $e) {
                // ignore
            }
        }

        $user->avatar = $publicPath;
        $user->save();

        return redirect()->route('profile')->with('success', 'Avatar berhasil diunggah.');
    }

    /**
     * Return JSON indicating whether the current user's profile is complete for applying.
     */
    public function checkComplete()
    {
        $user = auth()->user();
        if (!$user) return response()->json(['complete' => false, 'missing' => ['Silakan login terlebih dahulu']], 401);

        $missing = [];
        if (empty(trim((string) $user->name))) $missing[] = 'Nama Lengkap';
        if (empty(trim((string) $user->email))) $missing[] = 'Email';
        if (empty(trim((string) $user->telepon))) $missing[] = 'No. Handphone';
        if (empty(trim((string) $user->pendidikan))) $missing[] = 'Pendidikan';
        if (empty(trim((string) $user->alamat))) $missing[] = 'Alamat';
        if (empty(trim((string) $user->username))) $missing[] = 'Username';
        if (empty(trim((string) $user->jurusan))) $missing[] = 'Jurusan';

        $peserta = \App\Models\PesertaMagangModel::where('id_user', $user->id)->first();
        if (!$peserta) {
            $missing[] = 'Data peserta (lengkapi data peserta)';
        } else {
            if (empty(trim((string) $peserta->asal_institusi))) $missing[] = 'Asal Institusi';
            // CV is optional for applying, so do not mark it as missing here
        }

        return response()->json(['complete' => empty($missing), 'missing' => $missing]);
    }
}
