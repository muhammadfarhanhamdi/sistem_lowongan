<?php

namespace App\Http\Controllers;

use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\PeriodeMagangService;


class PeriodeMagangController extends Controller
{
    protected $periodeMagangService;

    public function __construct(PeriodeMagangService $periodeMagangService)
    {
        $this->periodeMagangService = $periodeMagangService;
    }


    public function index()
    {
        $periodes = $this->periodeMagangService->getAllActivePeriodeMagang();
        return view('admin.periode_magang.index', compact('periodes'));
    }

    public function create()
    {
        return view('admin.periode_magang.create');
    }

    public function store(Request $request)
    {
        try {
            $validatedData = $this->periodeMagangService->validatePeriodeMagangData($request);
            $periode = $this->periodeMagangService->createPeriodeMagang($validatedData);
            Alert::success('Berhasil', 'Periode Magang berhasil ditambahkan.');
            return redirect()->route('admin.periode_magang.edit', ['id' => $periode->id]);
        } catch (\Exception $e) {
            Alert::error('Gagal', 'Terjadi kesalahan: ' . $e->getMessage());
            return redirect()->back()->withInput();
        }
    }

    public function edit($id)
    {
        try {
            $periode = $this->periodeMagangService->getPeriodeMagangById($id);
            return view('admin.periode_magang.edit', compact('periode'));

        } catch (\Exception $e) {
            return redirect()->route('admin.periode_magang.index')
                ->with('error', 'Data periode magang tidak ditemukan.');
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $validatedData = $this->periodeMagangService->validatePeriodeMagangData($request);
            $this->periodeMagangService->updatePeriodeMagang($id, $validatedData);
            Alert::success('Berhasil', 'Periode Magang berhasil diperbarui.');
            return redirect()->route('admin.periode_magang.index');
        } catch (\Exception $e) {
            Alert::error('Gagal', 'Terjadi kesalahan: ' . $e->getMessage());
            return redirect()->back()->withInput();
        }
    }

    public function destroy($id)
    {
        try {
            $this->periodeMagangService->deletePeriodeMagang($id);
            Alert::success('Berhasil', 'Periode Magang berhasil dihapus.');
            return redirect()->route('admin.periode_magang.index');
        } catch (\Exception $e) {
            Alert::error('Gagal', 'Terjadi kesalahan saat menghapus data.');
            return redirect()->route('admin.periode_magang.index');
        }
    }
}