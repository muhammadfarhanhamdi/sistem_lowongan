@extends('layouts.app')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <div>
        <ol class="breadcrumb fs-sm mb-1">
            <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
        </ol>
        <h4 class="main-title mb-0">Dashboard Utama</h4>
    </div>
</div>

<div class="alert alert-success" role="alert">
    Selamat Datang di Admin Panel Sistem Lowongan Magang!
    <p>Semua fitur CRUD yang baru saja dibuat sudah siap digunakan melalui menu di sidebar.</p>
</div>

<div class="row row-cols-1 row-cols-md-3 g-4">
    <div class="col">
        <div class="card card-body bg-primary text-white">
            <h6 class="card-title text-white">Total Lowongan Aktif</h6>
            <h3 class="card-text">{{ $totalLowonganActive ?? 0 }}</h3>
            <p class="card-text">Lowongan yang sedang dibuka.</p>
        </div>
    </div>
    <div class="col">
        <div class="card card-body bg-warning text-dark">
            <h6 class="card-title">Total Peserta Terdaftar</h6>
            <h3 class="card-text">{{ $totalPeserta ?? 0 }}</h3>
            <p class="card-text">Akun peserta magang terdaftar.</p>
        </div>
    </div>
    <div class="col">
        <div class="card card-body bg-info text-white">
            <h6 class="card-title text-white">Total Pendaftar (Bulan Ini)</h6>
            <h3 class="card-text">{{ $totalPendaftarThisMonth ?? 0 }}</h3>
            <p class="card-text">Pendaftaran baru di bulan ini.</p>
        </div>
    </div>
</div>

<div class="row row-cols-1 row-cols-md-3 g-4 mt-3">
    <div class="col">
        <div class="card card-body bg-secondary text-white">
            <h6 class="card-title text-white">Pendaftar Menunggu Review</h6>
            <h3 class="card-text">{{ $totalPendingPendaftar ?? 0 }}</h3>
            <p class="card-text">Pendaftaran yang belum diterima atau ditolak.</p>
        </div>
    </div>
    <div class="col">
        <div class="card card-body bg-success text-white">
            <h6 class="card-title text-white">Total Dokumen Terupload</h6>
            <h3 class="card-text">{{ $totalDokumen ?? 0 }}</h3>
            <p class="card-text">Berkas CV / dokumen yang diunggah pelamar.</p>
        </div>
    </div>
</div>

<!-- Minimal trend indicator -->
<div class="row mt-4">
    <div class="col-md-6">
        <div class="card mb-3">
            <div class="card-body d-flex align-items-center gap-3">
                <div class="flex-shrink-0">
                    <i class="fa fa-users fa-2x text-primary"></i>
                </div>
                <div class="flex-grow-1">
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <h6 class="mb-0">Pendaftar (Bulan Ini)</h6>
                            <h3 class="mb-0">{{ $totalPendaftarThisMonth ?? 0 }}</h3>
                        </div>
                        <div class="text-end">
                            @if(isset($delta))
                                @if($delta > 0)
                                    <span class="badge bg-success"><i class="fa fa-arrow-up"></i> +{{ $percentChange }}%</span>
                                @elseif($delta < 0)
                                    <span class="badge bg-danger"><i class="fa fa-arrow-down"></i> {{ abs($percentChange) }}%</span>
                                @else
                                    <span class="badge bg-secondary">0%</span>
                                @endif
                                <div class="text-muted small">vs {{ $prevMonthCount ?? 0 }} bulan lalu</div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="card mb-3">
            <div class="card-body d-flex align-items-center gap-3">
                <div class="flex-shrink-0">
                    <i class="fa fa-file-alt fa-2x text-success"></i>
                </div>
                <div class="flex-grow-1">
                    <h6 class="mb-0">Total Dokumen Terupload</h6>
                    <h3 class="mb-0">{{ $totalDokumen ?? 0 }}</h3>
                    <div class="text-muted small">CV dan berkas pelamar</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection