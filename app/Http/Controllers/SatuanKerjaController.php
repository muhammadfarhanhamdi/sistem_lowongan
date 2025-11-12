<?php

namespace App\Http\Controllers;

use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\SatuanKerjaService;

class SatuanKerjaController extends Controller
{
    protected $satuanKerjaService;

    public function __construct(SatuanKerjaService $satuanKerjaService)
    {
        $this->satuanKerjaService = $satuanKerjaService;
    }


    public function index()
    {
        $satuanKerjas = $this->satuanKerjaService->getAllActiveSatuanKerja();
        return view('admin.satuan_kerja.index', compact('satuanKerjas'));
    }

    public function create()
    {
        return view('admin.satuan_kerja.create');
    }

    public function store(Request $request)
    {
        try {
            $validatedData = $this->satuanKerjaService->validateSatuanKerjaData($request);
            $satuanKerja = $this->satuanKerjaService->createSatuanKerja($validatedData);
            Alert::success('Berhasil', 'Satuan Kerja berhasil ditambahkan.');
            return redirect()->route('admin.satuan_kerja.edit', ['id' => $satuanKerja->id]);
        } catch (\Exception $e) {
            Alert::error('Gagal', 'Terjadi kesalahan: ' . $e->getMessage());
            return redirect()->back()->withInput();
        }
    }

    public function edit($id)
    {
        try {
            $satuanKerja = $this->satuanKerjaService->getSatuanKerjaById($id);
            return view('admin.satuan_kerja.edit', compact('satuanKerja'));

        } catch (\Exception $e) {
            return redirect()->route('admin.satuan_kerja.index')
                ->with('error', 'Data satuan kerja tidak ditemukan.');
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $validatedData = $this->satuanKerjaService->validateSatuanKerjaData($request, $id);
            $this->satuanKerjaService->updateSatuanKerja($id, $validatedData);
            Alert::success('Berhasil', 'Satuan Kerja berhasil diperbarui.');
            return redirect()->route('admin.satuan_kerja.index');
        } catch (\Exception $e) {
            Alert::error('Gagal', 'Terjadi kesalahan: ' . $e->getMessage());
            return redirect()->back()->withInput();
        }
    }

    public function destroy($id)
    {
        try {
            $this->satuanKerjaService->deleteSatuanKerja($id);
            Alert::success('Berhasil', 'Satuan Kerja berhasil dihapus.');
            return redirect()->route('admin.satuan_kerja.index');
        } catch (\Exception $e) {
            Alert::error('Gagal', 'Terjadi kesalahan saat menghapus data.');
            return redirect()->route('admin.satuan_kerja.index');
        }
    }
}