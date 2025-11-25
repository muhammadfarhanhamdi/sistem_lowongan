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

        // TODO: Simpan data lamaran ke tabel pelamar / notifications
        // Placeholder: flash success message
        return redirect()->back()->with('success', 'Lamaran Anda telah dikirim. Terima kasih.');
    }
}