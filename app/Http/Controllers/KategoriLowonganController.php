<?php

namespace App\Http\Controllers;

use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\KategoriLowonganService;


class KategoriLowonganController extends Controller
{
    protected $kategoriLowonganService;

    public function __construct(KategoriLowonganService $kategoriLowonganService)
    {
        $this->kategoriLowonganService = $kategoriLowonganService;
    }


    public function index()
    {
        $kategoris = $this->kategoriLowonganService->getAllActiveKategoriLowongan();
        return view('admin.kategori_lowongan.index', compact('kategoris'));
    }

    public function create()
    {
        return view('admin.kategori_lowongan.create');
    }

    public function store(Request $request)
    {
        try {
            $validatedData = $this->kategoriLowonganService->validateKategoriLowonganData($request);
            $kategori = $this->kategoriLowonganService->createKategoriLowongan($validatedData);
            Alert::success('Berhasil', 'Kategori Lowongan berhasil ditambahkan.');
            return redirect()->route('admin.kategori_lowongan.edit', ['id' => $kategori->id]);
        } catch (\Exception $e) {
            Alert::error('Gagal', 'Terjadi kesalahan: ' . $e->getMessage());
            return redirect()->back()->withInput();
        }
    }

    public function edit($id)
    {
        try {
            $kategori = $this->kategoriLowonganService->getKategoriLowonganById($id);
            return view('admin.kategori_lowongan.edit', compact('kategori'));

        } catch (\Exception $e) {
            return redirect()->route('admin.kategori_lowongan.index')
                ->with('error', 'Data kategori lowongan tidak ditemukan.');
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $validatedData = $this->kategoriLowonganService->validateKategoriLowonganData($request);
            $this->kategoriLowonganService->updateKategoriLowongan($id, $validatedData);
            Alert::success('Berhasil', 'Kategori Lowongan berhasil diperbarui.');
            return redirect()->route('admin.kategori_lowongan.index');
        } catch (\Exception $e) {
            Alert::error('Gagal', 'Terjadi kesalahan: ' . $e->getMessage());
            return redirect()->back()->withInput();
        }
    }

    public function destroy($id)
    {
        try {
            $this->kategoriLowonganService->deleteKategoriLowongan($id);
            Alert::success('Berhasil', 'Kategori Lowongan berhasil dihapus.');
            return redirect()->route('admin.kategori_lowongan.index');
        } catch (\Exception $e) {
            Alert::error('Gagal', 'Terjadi kesalahan saat menghapus data.');
            return redirect()->route('admin.kategori_lowongan.index');
        }
    }
}