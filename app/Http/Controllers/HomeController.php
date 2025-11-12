<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Services\LowonganService;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    protected $lowonganService;

    public function __construct(LowonganService $lowonganService)
    {
        $this->lowonganService = $lowonganService;
    }

    public function index()
    {
        // Panggil method baru yang sudah ditambahkan di Service
        $lowongans = $this->lowonganService->getPublicActiveLowongan(); 

        $total_lowongan = $lowongans->count(); 
        $total_pelamar = 1200;
        
        return view('welcome', compact('lowongans', 'total_lowongan', 'total_pelamar'));
    }
}