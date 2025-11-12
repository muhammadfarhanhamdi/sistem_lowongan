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
            <h3 class="card-text">5</h3>
            <p class="card-text">Lowongan yang sedang dibuka.</p>
        </div>
    </div>
    <div class="col">
        <div class="card card-body bg-warning text-dark">
            <h6 class="card-title">Total Peserta Terdaftar</h6>
            <h3 class="card-text">20</h3>
            <p class="card-text">Akun peserta magang terdaftar.</p>
        </div>
    </div>
    <div class="col">
        <div class="card card-body bg-info text-white">
            <h6 class="card-title text-white">Total Pendaftar (Bulan Ini)</h6>
            <h3 class="card-text">15</h3>
            <p class="card-text">Pendaftaran baru di bulan ini.</p>
        </div>
    </div>
</div>
@endsection