<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LowonganModel;
use App\Models\PesertaMagangModel;
use App\Models\PendaftaranModel;
use App\Models\DokumenModel;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {

        // if (auth()->user()->role !== 'admin') {
        //     abort(403, 'Unauthorized action.');
        // }

        $totalLowonganActive = LowonganModel::where('status', 1)->count();
        $totalPeserta = PesertaMagangModel::where('status', 1)->count();

        $now = Carbon::now();
        $totalPendaftarThisMonth = PendaftaranModel::whereYear('tanggal_daftar', $now->year)
            ->whereMonth('tanggal_daftar', $now->month)
            ->count();

        $totalPendingPendaftar = PendaftaranModel::whereNull('status_penerimaan')->count();

        // Dokumen stored on db_magang connection
        $totalDokumen = DokumenModel::count();

        // compute previous month count for simple trend indicator
        $prev = $now->copy()->subMonth();
        $prevMonthCount = PendaftaranModel::whereYear('tanggal_daftar', $prev->year)
            ->whereMonth('tanggal_daftar', $prev->month)
            ->count();

        $delta = $totalPendaftarThisMonth - $prevMonthCount;
        if ($prevMonthCount > 0) {
            $percentChange = round(($delta / $prevMonthCount) * 100, 1);
        } else {
            $percentChange = $totalPendaftarThisMonth > 0 ? 100 : 0;
        }

        return view('admin.dashboard.index', compact(
            'totalLowonganActive',
            'totalPeserta',
            'totalPendaftarThisMonth',
            'totalPendingPendaftar',
            'totalDokumen',
            'prevMonthCount',
            'delta',
            'percentChange'
        ));
    }
}

