<?php

namespace App\Http\Controllers;

use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\LowonganService;
use App\Services\SatuanKerjaService;
use App\Services\KategoriLowonganService;
use App\Services\PeriodeMagangService;
use App\Services\JenjangPendidikanService;
use App\Services\JurusanService;

class LowonganController extends Controller
{
    protected $lowonganService;
    protected $satuanKerjaService;
    protected $kategoriLowonganService;
    protected $periodeMagangService;
    protected $jenjangPendidikanService;
    protected $jurusanService;

    public function __construct(
        LowonganService $lowonganService,
        SatuanKerjaService $satuanKerjaService,
        KategoriLowonganService $kategoriLowonganService,
        PeriodeMagangService $periodeMagangService,
        JenjangPendidikanService $jenjangPendidikanService,
        JurusanService $jurusanService
    ) {
        $this->lowonganService = $lowonganService;
        $this->satuanKerjaService = $satuanKerjaService;
        $this->kategoriLowonganService = $kategoriLowonganService;
        $this->periodeMagangService = $periodeMagangService;
        $this->jenjangPendidikanService = $jenjangPendidikanService;
        $this->jurusanService = $jurusanService;
    }


    public function index()
    {
        $lowongans = $this->lowonganService->getAllActiveLowongan();
        return view('admin.lowongan.index', compact('lowongans'));
    }

    public function create()
    {
        $satuanKerjas = $this->satuanKerjaService->getAllActiveSatuanKerja();
        $kategoris = $this->kategoriLowonganService->getAllActiveKategoriLowongan();
        $periodes = $this->periodeMagangService->getAllActivePeriodeMagang();
        $jenjangs = $this->jenjangPendidikanService->getAllActiveJenjang();
        $jurusans = $this->jurusanService->getAllActiveJurusan();
        
        return view('admin.lowongan.create', compact('satuanKerjas', 'kategoris', 'periodes', 'jenjangs', 'jurusans'));
    }

    public function store(Request $request)
    {
        try {
            $validatedData = $this->lowonganService->validateLowonganData($request);
            
            $jurusanIds = $validatedData['jurusan_ids'];
            unset($validatedData['jurusan_ids']);
            
            $lowongan = $this->lowonganService->createLowongan($validatedData);
            
            $lowongan->jurusan()->sync($jurusanIds);
            
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
            $jenjangs = $this->jenjangPendidikanService->getAllActiveJenjang();
            $jurusans = $this->jurusanService->getAllActiveJurusan();
            
            $selectedJurusanIds = $lowongan->jurusan->pluck('id')->toArray();

            return view('admin.lowongan.edit', compact('lowongan', 'satuanKerjas', 'kategoris', 'periodes', 'jenjangs', 'jurusans', 'selectedJurusanIds'));

        } catch (\Exception $e) {
            Alert::error('Gagal', 'Data lowongan tidak ditemukan.');
            return redirect()->route('admin.lowongan.index');
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $validatedData = $this->lowonganService->validateLowonganData($request);
            
            $jurusanIds = $validatedData['jurusan_ids'];
            unset($validatedData['jurusan_ids']);
            
            $lowongan = $this->lowonganService->updateLowongan($id, $validatedData);

            $lowongan->jurusan()->sync($jurusanIds);
            
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

