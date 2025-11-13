<?php

namespace App\Http\Controllers;

use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\JenjangPendidikanService;


class JenjangPendidikanController extends Controller
{
    protected $jenjangPendidikanService;

    public function __construct(JenjangPendidikanService $jenjangPendidikanService)
    {
        $this->jenjangPendidikanService = $jenjangPendidikanService;
    }


    public function index()
    {
        $jenjangs = $this->jenjangPendidikanService->getAllActiveJenjang();
        return view('admin.jenjang_pendidikan.index', compact('jenjangs'));
    }

    public function create()
    {
        return view('admin.jenjang_pendidikan.create');
    }

    public function store(Request $request)
    {
        try {
            $validatedData = $this->jenjangPendidikanService->validateJenjangData($request);
            $jenjang = $this->jenjangPendidikanService->createJenjang($validatedData);
            Alert::success('Berhasil', 'Jenjang Pendidikan berhasil ditambahkan.');
            return redirect()->route('admin.jenjang_pendidikan.edit', ['id' => $jenjang->id]);
        } catch (\Exception $e) {
            Alert::error('Gagal', 'Terjadi kesalahan: ' . $e->getMessage());
            return redirect()->back()->withInput();
        }
    }

    public function edit($id)
    {
        try {
            $jenjang = $this->jenjangPendidikanService->getJenjangById($id);
            return view('admin.jenjang_pendidikan.edit', compact('jenjang'));

        } catch (\Exception $e) {
            return redirect()->route('admin.jenjang_pendidikan.index')
                ->with('error', 'Data jenjang pendidikan tidak ditemukan.');
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $validatedData = $this->jenjangPendidikanService->validateJenjangData($request, $id); 
            
            $this->jenjangPendidikanService->updateJenjang($id, $validatedData);
            Alert::success('Berhasil', 'Jenjang Pendidikan berhasil diperbarui.');
            return redirect()->route('admin.jenjang_pendidikan.index');
        } catch (\Exception $e) {
            Alert::error('Gagal', 'Terjadi kesalahan: ' . $e->getMessage());
            return redirect()->back()->withInput();
        }
    }

    public function destroy($id)
    {
        try {
            $this->jenjangPendidikanService->deleteJenjang($id);
            Alert::success('Berhasil', 'Jenjang Pendidikan berhasil dihapus.');
            return redirect()->route('admin.jenjang_pendidikan.index');
        } catch (\Exception $e) {
            Alert::error('Gagal', 'Terjadi kesalahan saat menghapus data.');
            return redirect()->route('admin.jenjang_pendidikan.index');
        }
    }
}