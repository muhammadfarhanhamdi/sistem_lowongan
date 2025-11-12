<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\SatuanKerjaController;



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
    
});

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
// ubah route index menajdi welcome.blade.php
Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/ketentuanumum', function () {
    return view('public.ketentuan.umum');
})->name('public.ketentuan.umum');

Route::get('/ketentuanesai', function () {
    return view('public.ketentuan.esai');
})->name('public.ketentuan.esai');
Route::get('/ketentuankampanye', function () {
    return view('public.ketentuan.kampanye');
})->name('public.ketentuan.kampanye');
Route::get('/pengumumankegiatan', function () {
    return view('public.pengumuman.kegiatan');
})->name('public.pengumuman.kegiatan');
Route::get('/pengumumanseleksi', function () {
    return view('public.pengumuman.seleksi');
})->name('public.pengumuman.seleksi');

Route::get('/publikasi', function () {
    return view('public.publikasi.publikasi');
})
->name('public.publikasi.publikasi');
// Public About page route (used by navbar and CTAs)
Route::get('/tentang-kami', function () {
    return view('Public.TentangKami.index');
})->name('tentang.kami');
Route::get('/lowongan', function () {
    return view('Public.Lowongan.index');
})->name('public.lowongan.lowongan');

Route::get('/tentangkami', function () {
    return view('public.tentang.tentang');
})->name('public.tentang.tentang');

// Public Contact page route
Route::get('/hubungi-kami', function () {
    return view('Public.HubungiKami.index');
})->name('hubungi.kami');

// Public Satuan Kerja page route
Route::get('/satuan-kerja', function () {
    return view('Public.SatuanKerja.index');
})->name('satuan.kerja');

// Route::get('/login', function () {
//     if (Auth::check()) {
//         return redirect()->route('admin.dashboard.index');
//     }
//     return redirect('/login');
// });
// Route::get('/login', function () {
//     return view('auth.login');
// });

Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', function () {
    Auth::logout();
    return redirect('/login');
})->name('logout');
