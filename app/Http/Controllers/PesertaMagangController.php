<?php

namespace App\Http\Controllers;

use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\PesertaMagangService;
use App\Services\UserService;
use App\Models\RoleModel;

class PesertaMagangController extends Controller
{
    protected $pesertaMagangService;
    protected $userService;

    public function __construct(PesertaMagangService $pesertaMagangService, UserService $userService)
    {
        $this->pesertaMagangService = $pesertaMagangService;
        $this->userService = $userService;
    }


    public function index()
    {
        $pesertas = $this->pesertaMagangService->getAllActivePeserta();
        return view('admin.peserta_magang.index', compact('pesertas'));
    }

    public function create()
    {
        $roleId = RoleModel::where('nama_role', 'peserta_magang')->value('id');
        
        $allUsers = $this->userService->getAllActiveUsers();
        $users = $allUsers->where('id_role', $roleId);

        return view('admin.peserta_magang.create', compact('users'));
    }

    public function store(Request $request)
    {
        try {
            $validatedData = $this->pesertaMagangService->validatePesertaData($request);
            $peserta = $this->pesertaMagangService->createPeserta($validatedData);
            Alert::success('Berhasil', 'Data Peserta Magang berhasil ditambahkan.');
            return redirect()->route('admin.peserta_magang.edit', ['id' => $peserta->id]);
        } catch (\Exception $e) {
            Alert::error('Gagal', 'Terjadi kesalahan: ' . $e->getMessage());
            return redirect()->back()->withInput();
        }
    }

    public function edit($id)
    {
        try {
            $peserta = $this->pesertaMagangService->getPesertaById($id);

            $roleId = RoleModel::where('nama_role', 'peserta_magang')->value('id');
            $allUsers = $this->userService->getAllActiveUsers();
            $users = $allUsers->where('id_role', $roleId);

            return view('admin.peserta_magang.edit', compact('peserta', 'users'));

        } catch (\Exception $e) {
            return redirect()->route('admin.peserta_magang.index')
                ->with('error', 'Data peserta magang tidak ditemukan.');
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $validatedData = $this->pesertaMagangService->validatePesertaData($request, $id);
            $this->pesertaMagangService->updatePeserta($id, $validatedData);
            Alert::success('Berhasil', 'Data Peserta Magang berhasil diperbarui.');
            return redirect()->route('admin.peserta_magang.index');
        } catch (\Exception $e) {
            Alert::error('Gagal', 'Terjadi kesalahan: ' . $e->getMessage());
            return redirect()->back()->withInput();
        }
    }

    public function destroy($id)
    {
        try {
            $this->pesertaMagangService->deletePeserta($id);
            Alert::success('Berhasil', 'Data Peserta Magang berhasil dihapus.');
            return redirect()->route('admin.peserta_magang.index');
        } catch (\Exception $e) {
            Alert::error('Gagal', 'Terjadi kesalahan saat menghapus data.');
            return redirect()->route('admin.peserta_magang.index');
        }
    }
}