<?php

namespace App\Http\Controllers;

use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\LowonganService;
use App\Services\SatuanKerjaService;
use App\Services\KategoriLowonganService;
use App\Services\PeriodeMagangService;

class LowonganController extends Controller
{
    protected $lowonganService;
    protected $satuanKerjaService;
    protected $kategoriLowonganService;
    protected $periodeMagangService;

    public function __construct(
        LowonganService $lowonganService,
        SatuanKerjaService $satuanKerjaService,
        KategoriLowonganService $kategoriLowonganService,
        PeriodeMagangService $periodeMagangService
    ) {
        $this->lowonganService = $lowonganService;
        $this->satuanKerjaService = $satuanKerjaService;
        $this->kategoriLowonganService = $kategoriLowonganService;
        $this->periodeMagangService = $periodeMagangService;
    }


    public function index()
    {
        // MEMANGGIL METHOD BARU DARI SERVICE
        $lowongans = $this->lowonganService->getAllActiveLowonganForCards();
        return view('admin.lowongan.index', compact('lowongans'));
    }

    public function create()
    {
        $satuanKerjas = $this->satuanKerjaService->getAllActiveSatuanKerja();
        $kategoris = $this->kategoriLowonganService->getAllActiveKategoriLowongan();
        $periodes = $this->periodeMagangService->getAllActivePeriodeMagang();
        
        return view('admin.lowongan.create', compact('satuanKerjas', 'kategoris', 'periodes'));
    }

    public function store(Request $request)
    {
        try {
            $validatedData = $this->lowonganService->validateLowonganData($request);
            $lowongan = $this->lowonganService->createLowongan($validatedData);
            Alert::success('Berhasil', 'Lowongan berhasil ditambahkan.');
            return redirect()->route('admin.lowongan.edit', ['id' => $lowongan->id]);
        } catch (\Exception $e) {
            Alert::error('Gagal', 'Terjadi kesalahan: ' . $e->getMessage());
            return redirect()->back()->withInput();
        }
    }

    public function edit($id)
    {
        try {
            $lowongan = $this->lowonganService->getLowonganById($id);
            $satuanKerjas = $this->satuanKerjaService->getAllActiveSatuanKerja();
            $kategoris = $this->kategoriLowonganService->getAllActiveKategoriLowongan();
            $periodes = $this->periodeMagangService->getAllActivePeriodeMagang();

            return view('admin.lowongan.edit', compact('lowongan', 'satuanKerjas', 'kategoris', 'periodes'));

        } catch (\Exception $e) {
            return redirect()->route('admin.lowongan.index')
                ->with('error', 'Data lowongan tidak ditemukan.');
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $validatedData = $this->lowonganService->validateLowonganData($request);
            $this->lowonganService->updateLowongan($id, $validatedData);
            Alert::success('Berhasil', 'Lowongan berhasil diperbarui.');
            return redirect()->route('admin.lowongan.index');
        } catch (\Exception $e) {
            Alert::error('Gagal', 'Terjadi kesalahan: ' . $e->getMessage());
            return redirect()->back()->withInput();
        }
    }

    public function destroy($id)
    {
        try {
            $this->lowonganService->deleteLowongan($id);
            Alert::success('Berhasil', 'Lowongan berhasil dihapus.');
            return redirect()->route('admin.lowongan.index');
        } catch (\Exception $e) {
            Alert::error('Gagal', 'Terjadi kesalahan saat menghapus data.');
            return redirect()->route('admin.lowongan.index');
        }
    }
}