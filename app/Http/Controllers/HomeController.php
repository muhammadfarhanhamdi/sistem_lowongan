<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Services\LowonganService;
use App\Services\KategoriLowonganService;
use App\Services\SatuanKerjaService;
use App\Services\JurusanService;
use App\Services\JenjangPendidikanService;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    protected $lowonganService;
    protected $kategoriLowonganService;
    protected $satuanKerjaService;
    protected $jurusanService;
    protected $jenjangPendidikanService;

    public function __construct(
        LowonganService $lowonganService,
        KategoriLowonganService $kategoriLowonganService,
        SatuanKerjaService $satuanKerjaService,
        JurusanService $jurusanService,
        JenjangPendidikanService $jenjangPendidikanService
    ) {
        $this->lowonganService = $lowonganService;
        $this->kategoriLowonganService = $kategoriLowonganService;
        $this->satuanKerjaService = $satuanKerjaService;
        $this->jurusanService = $jurusanService;
        $this->jenjangPendidikanService = $jenjangPendidikanService;
    }

    public function index(Request $request)
    {
        $kategoris = $this->kategoriLowonganService->getAllActiveKategoriLowongan();
        $satuanKerjas = $this->satuanKerjaService->getAllActiveSatuanKerja();
        $jurusans = $this->jurusanService->getAllActiveJurusan();
        $jenjangs = $this->jenjangPendidikanService->getAllActiveJenjang();

        $query = $this->lowonganService->getPublicActiveLowongan($request->all());
        
        $lowongans = $query->paginate(6)->appends($request->query());

        $total_lowongan = $lowongans->total(); 
        $total_pelamar = 1200; 

        return view('welcome', compact(
            'lowongans', 
            'total_lowongan', 
            'total_pelamar', 
            'kategoris', 
            'satuanKerjas', 
            'jurusans', 
            'jenjangs'
        ));
    }

    public function showLowonganPage(Request $request)
    {
        $kategoris = $this->kategoriLowonganService->getAllActiveKategoriLowongan();
        $satuanKerjas = $this->satuanKerjaService->getAllActiveSatuanKerja();
        $jurusans = $this->jurusanService->getAllActiveJurusan();
        $jenjangs = $this->jenjangPendidikanService->getAllActiveJenjang();

        $query = $this->lowonganService->getPublicActiveLowongan($request->all());
        
        $lowongans = $query->paginate(6)->appends($request->query());

        $total_lowongan = $lowongans->total(); 
        $total_pelamar = 1200; // ini statis

        return view('Public.Lowongan.index', compact(
            'lowongans', 
            'total_lowongan', 
            'total_pelamar', 
            'kategoris', 
            'satuanKerjas', 
            'jurusans', 
            'jenjangs'
        ));
    }

    public function showLowonganDetail($id)
    {
        try {
            $lowongan = $this->lowonganService->getLowonganById($id);
            return view('Public.Lowongan.detaillowongan', compact('lowongan'));
        } catch (\Exception $e) {
            abort(404);
        }
    }

    /**
     * Apply to a lowongan (placeholder implementation).
     * Route protected by 'auth' middleware.
     */
    public function applyLowongan(Request $request, $id)
    {
        try {
            $lowongan = $this->lowonganService->getLowonganById($id);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Lowongan tidak ditemukan.');
        }

        // Ensure user has completed peserta profile
        if (!\Auth::check()) {
            return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu.');
        }

        $user = \Auth::user();
        // find peserta record
        $peserta = \App\Models\PesertaMagangModel::where('id_user', $user->id)->first();
        // Check required profile fields for a valid application
        $missing = [];
        // basic user fields (require all profile fields except CV)
        if (empty(trim((string) $user->name))) $missing[] = 'Nama Lengkap';
        if (empty(trim((string) $user->email))) $missing[] = 'Email';
        if (empty(trim((string) $user->telepon))) $missing[] = 'No. Handphone';
        if (empty(trim((string) $user->pendidikan))) $missing[] = 'Pendidikan';
        if (empty(trim((string) $user->alamat))) $missing[] = 'Alamat';
        if (empty(trim((string) $user->username))) $missing[] = 'Username';
        if (empty(trim((string) $user->jurusan))) $missing[] = 'Jurusan';

        if (!$peserta) {
            // peserta record missing: create a minimal peserta record automatically so user can apply
            try {
                $peserta = new \App\Models\PesertaMagangModel();
                $peserta->id_user = $user->id;
                $peserta->nim = null;
                // provide a placeholder for required asal_institusi to satisfy DB constraints and UX
                $peserta->asal_institusi = 'N/A';
                $peserta->jurusan = null;
                $peserta->fakultas = null;
                // tanggal will be set below from lowongan->periode if available
                $peserta->status = 1;
                $peserta->save();
            } catch (\Throwable $e) {
                // if creating peserta fails, mark as missing so user can fill manually
                $missing[] = 'Data peserta (klik Lengkapi Data Peserta)';
            }
        }

        if ($peserta) {
            // peserta exists: check peserta fields
            if (empty(trim((string) $peserta->asal_institusi)) || $peserta->asal_institusi === 'N/A') $missing[] = 'Asal Institusi';
            // CV is optional for applying; do not require it here
        }

        if (!empty($missing)) {
            // redirect user to profile with a friendly alert listing missing fields
            $msg = 'Profil Anda belum lengkap: ' . implode(', ', $missing) . '. Silakan lengkapi profil sebelum melamar.';
            return redirect()->route('profile')->with('profile_incomplete', $msg);
        }

        // prevent duplicate application
        $already = \App\Models\PendaftaranModel::where('id_peserta', $peserta->id)
            ->where('id_lowongan', $lowongan->id)
            ->first();
        if ($already) {
            return redirect()->back()->with('error', 'Anda sudah pernah melamar pada lowongan ini.');
        }

        // Jika lowongan memiliki periode magang (tanggal mulai/selesai), isi data peserta jika masih kosong
        try {
            if ($lowongan->periode) {
                $periode = $lowongan->periode;
                $changed = false;
                if (empty($peserta->tanggal_mulai_magang) && !empty($periode->tanggal_mulai)) {
                    $peserta->tanggal_mulai_magang = $periode->tanggal_mulai;
                    $changed = true;
                }
                if (empty($peserta->tanggal_selesai_magang) && !empty($periode->tanggal_selesai)) {
                    $peserta->tanggal_selesai_magang = $periode->tanggal_selesai;
                    $changed = true;
                }
                if ($changed) {
                    $peserta->save();
                }
            } elseif (!empty($lowongan->durasi) && (empty($peserta->tanggal_mulai_magang) || empty($peserta->tanggal_selesai_magang))) {
                // Fallback: jika lowongan punya durasi (mis. '3 Bulan') dan peserta belum punya tanggal,
                // kita tidak bisa menebak tanggal pasti — biarkan admin atau peserta mengisi.
            }
        } catch (\Throwable $e) {
            // ignore periode update failure
        }

        // create pendaftaran
        $pendaftaran = new \App\Models\PendaftaranModel();
        $pendaftaran->id_peserta = $peserta->id;
        $pendaftaran->id_lowongan = $lowongan->id;
        $pendaftaran->jenis_pendaftaran = 'magang';
        $pendaftaran->tanggal_daftar = now();
        $pendaftaran->status_penerimaan = 'menunggu';
        $pendaftaran->status = 1;
        // attach CV path from latest dokumen if available
        try {
            $dok = \App\Models\DokumenModel::where('id_peserta', $peserta->id)
                ->where('jenis_dokumen', 'CV')
                ->orderBy('tanggal_upload', 'desc')
                ->first();
            if ($dok && $dok->file_path) {
                $pendaftaran->cv_path = $dok->file_path;
            }
        } catch (\Throwable $e) {
            // ignore
        }

        $pendaftaran->save();

        return redirect()->back()->with('success', 'Lamaran Anda telah terkirim. Silakan tunggu konfirmasi dari admin.');
    }

    /**
     * Show current user's applications (penerimaan status)
     */
    public function myApplications()
    {
        $user = \Auth::user();

        $pendaftaran = \App\Models\PendaftaranModel::with(['lowongan','peserta'])
            ->whereHas('peserta', function($q) use ($user){
                $q->where('id_user', $user->id);
            })->orderBy('tanggal_daftar','desc')->get();

        return view('Public.my_applications', compact('pendaftaran'));
    }
}