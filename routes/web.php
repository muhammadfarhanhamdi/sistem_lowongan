<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\LowonganController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\SatuanKerjaController;
use App\Http\Controllers\PeriodeMagangController;
use App\Http\Controllers\PesertaMagangController;
use App\Http\Controllers\KategoriLowonganController;
use App\Http\Controllers\JenjangPendidikanController;



Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

    //route Manajemen User
    Route::get('/user', [UserController::class, 'index'])->name('user.index');
    Route::get('/user/add', [UserController::class, 'create'])->name('user.add');
    Route::post('/user/add', [UserController::class, 'store'])->name('user.store');
    Route::get('/user/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
    Route::put('/user/{id}', [UserController::class, 'update'])->name('user.update');
    Route::delete('/user/{id}', [UserController::class, 'destroy'])->name('user.destroy');

    //route satuan kerja
    Route::get('/satuan-kerja', [SatuanKerjaController::class, 'index'])->name('satuan_kerja.index');
    Route::get('/satuan-kerja/add', [SatuanKerjaController::class, 'create'])->name('satuan_kerja.add');
    Route::post('/satuan-kerja/add', [SatuanKerjaController::class, 'store'])->name('satuan_kerja.store');
    Route::get('/satuan-kerja/edit/{id}', [SatuanKerjaController::class, 'edit'])->name('satuan_kerja.edit');
    Route::put('/satuan-kerja/{id}', [SatuanKerjaController::class, 'update'])->name('satuan_kerja.update');
    Route::delete('/satuan-kerja/{id}', [SatuanKerjaController::class, 'destroy'])->name('satuan_kerja.destroy');

    //route lowongan
    Route::get('/lowongan', [LowonganController::class, 'index'])->name('lowongan.index');
    Route::get('/lowongan/add', [LowonganController::class, 'create'])->name('lowongan.add');
    Route::post('/lowongan/add', [LowonganController::class, 'store'])->name('lowongan.store');
    Route::get('/lowongan/edit/{id}', [LowonganController::class, 'edit'])->name('lowongan.edit');
    Route::put('/lowongan/{id}', [LowonganController::class, 'update'])->name('lowongan.update');
    Route::delete('/lowongan/{id}', [LowonganController::class, 'destroy'])->name('lowongan.destroy');

    //route periode magang
    Route::get('/periode-magang', [PeriodeMagangController::class, 'index'])->name('periode_magang.index');
    Route::get('/periode-magang/add', [PeriodeMagangController::class, 'create'])->name('periode_magang.add');
    Route::post('/periode-magang/add', [PeriodeMagangController::class, 'store'])->name('periode_magang.store');
    Route::get('/periode-magang/edit/{id}', [PeriodeMagangController::class, 'edit'])->name('periode_magang.edit');
    Route::put('/periode-magang/{id}', [PeriodeMagangController::class, 'update'])->name('periode_magang.update');
    Route::delete('/periode-magang/{id}', [PeriodeMagangController::class, 'destroy'])->name('periode_magang.destroy');

    //route kategori lowongan
    Route::get('/kategori-lowongan', [KategoriLowonganController::class, 'index'])->name('kategori_lowongan.index');
    Route::get('/kategori-lowongan/add', [KategoriLowonganController::class, 'create'])->name('kategori_lowongan.add');
    Route::post('/kategori-lowongan/add', [KategoriLowonganController::class, 'store'])->name('kategori_lowongan.store');
    Route::get('/kategori-lowongan/edit/{id}', [KategoriLowonganController::class, 'edit'])->name('kategori_lowongan.edit');
    Route::put('/kategori-lowongan/{id}', [KategoriLowonganController::class, 'update'])->name('kategori_lowongan.update');
    Route::delete('/kategori-lowongan/{id}', [KategoriLowonganController::class, 'destroy'])->name('kategori_lowongan.destroy');

    //route peserta magang
    Route::get('/peserta-magang', [PesertaMagangController::class, 'index'])->name('peserta_magang.index');
    Route::get('/peserta-magang/add', [PesertaMagangController::class, 'create'])->name('peserta_magang.add');
    Route::post('/peserta-magang/add', [PesertaMagangController::class, 'store'])->name('peserta_magang.store');
    Route::get('/peserta-magang/edit/{id}', [PesertaMagangController::class, 'edit'])->name('peserta_magang.edit');
    Route::put('/peserta-magang/{id}', [PesertaMagangController::class, 'update'])->name('peserta_magang.update');
    Route::delete('/peserta-magang/{id}', [PesertaMagangController::class, 'destroy'])->name('peserta_magang.destroy');

    //route jenjang pendidikan
    Route::get('/jenjang-pendidikan', [JenjangPendidikanController::class, 'index'])->name('jenjang_pendidikan.index');
    Route::get('/jenjang-pendidikan/add', [JenjangPendidikanController::class, 'create'])->name('jenjang_pendidikan.add');
    Route::post('/jenjang-pendidikan/add', [JenjangPendidikanController::class, 'store'])->name('jenjang_pendidikan.store');
    Route::get('/jenjang-pendidikan/edit/{id}', [JenjangPendidikanController::class, 'edit'])->name('jenjang_pendidikan.edit');
    Route::put('/jenjang-pendidikan/{id}', [JenjangPendidikanController::class, 'update'])->name('jenjang_pendidikan.update');
    Route::delete('/jenjang-pendidikan/{id}', [JenjangPendidikanController::class, 'destroy'])->name('jenjang_pendidikan.destroy');

    //route jurusan
    Route::get('/jurusan', [JurusanController::class, 'index'])->name('jurusan.index');
    Route::get('/jurusan/add', [JurusanController::class, 'create'])->name('jurusan.add');
    Route::post('/jurusan/add', [JurusanController::class, 'store'])->name('jurusan.store');
    Route::get('/jurusan/edit/{id}', [JurusanController::class, 'edit'])->name('jurusan.edit');
    Route::put('/jurusan/{id}', [JurusanController::class, 'update'])->name('jurusan.update');
    Route::delete('/jurusan/{id}', [JurusanController::class, 'destroy'])->name('jurusan.destroy');
    
});

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
// ubah route index menajdi welcome.blade.php
// Route::get('/', function () {
//     return view('welcome');
// })->name('welcome');

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('welcome');

Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', function () {
    Auth::logout();
    return redirect('/login');
})->name('logout');
