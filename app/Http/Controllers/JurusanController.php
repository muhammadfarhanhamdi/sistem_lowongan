<?php

namespace App\Http\Controllers;

use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\JurusanService;


class JurusanController extends Controller
{
    protected $jurusanService;

    public function __construct(JurusanService $jurusanService)
    {
        $this->jurusanService = $jurusanService;
    }


    public function index()
    {
        $jurusans = $this->jurusanService->getAllActiveJurusan();
        return view('admin.jurusan.index', compact('jurusans'));
    }

    public function create()
    {
        return view('admin.jurusan.create');
    }

    public function store(Request $request)
    {
        try {
            $validatedData = $this->jurusanService->validateJurusanData($request);
            $jurusan = $this->jurusanService->createJurusan($validatedData);
            Alert::success('Berhasil', 'Jurusan berhasil ditambahkan.');
            return redirect()->route('admin.jurusan.edit', ['id' => $jurusan->id]);
        } catch (\Exception $e) {
            Alert::error('Gagal', 'Terjadi kesalahan: ' . $e->getMessage());
            return redirect()->back()->withInput();
        }
    }

    public function edit($id)
    {
        try {
            $jurusan = $this->jurusanService->getJurusanById($id);
            return view('admin.jurusan.edit', compact('jurusan'));

        } catch (\Exception $e) {
            return redirect()->route('admin.jurusan.index')
                ->with('error', 'Data jurusan tidak ditemukan.');
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $validatedData = $this->jurusanService->validateJurusanData($request, $id); 
            
            $this->jurusanService->updateJurusan($id, $validatedData);
            Alert::success('Berhasil', 'Jurusan berhasil diperbarui.');
            return redirect()->route('admin.jurusan.index');
        } catch (\Exception $e) {
            Alert::error('Gagal', 'Terjadi kesalahan: ' . $e->getMessage());
            return redirect()->back()->withInput();
        }
    }

    public function destroy($id)
    {
        try {
            $this->jurusanService->deleteJurusan($id);
            Alert::success('Berhasil', 'Jurusan berhasil dihapus.');
            return redirect()->route('admin.jurusan.index');
        } catch (\Exception $e) {
            Alert::error('Gagal', 'Terjadi kesalahan saat menghapus data.');
            return redirect()->route('admin.jurusan.index');
        }
    }
}