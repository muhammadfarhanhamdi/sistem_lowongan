<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MakController;
use App\Http\Controllers\BastController;
use App\Http\Controllers\RapatController;
use App\Http\Controllers\TahunController;
use App\Http\Controllers\SatuanController;
use App\Http\Controllers\JabatanController;
use App\Http\Controllers\SkoringController;
use App\Http\Controllers\InstansiController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\UndanganController;
use App\Http\Controllers\AsalSuratController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\InformasiController;
use App\Http\Controllers\KodeSuratController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\TipeUndanganController;
use App\Http\Controllers\ArsipPerencanaanController;
use App\Http\Controllers\KlasifikasiSuratController;
use App\Http\Controllers\SuratMasukPerencanaanController;
use App\Http\Controllers\DaftarHadirController;
use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\KontenSettingController;
use App\Http\Controllers\KriteriaController;
use App\Http\Controllers\PartisipasiController;
use App\Http\Controllers\PosterController;
use App\Http\Controllers\RekapitulasiController;
use App\Http\Controllers\SkoringCvController;
use App\Http\Controllers\TingkatController;
use App\Http\Controllers\PublikasiController;



Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');



    Route::get('/tingkat', [TingkatController::class, 'index'])->name('tingkat.index');
    Route::get('/tingkat/create', [TingkatController::class, 'create'])->name('tingkat.create');
    Route::post('/tingkat', [TingkatController::class, 'store'])->name('tingkat.store');
    Route::get('/tingkat/{id}/edit', [TingkatController::class, 'edit'])->name('tingkat.edit');
    Route::put('/tingkat/{id}', [TingkatController::class, 'update'])->name('tingkat.update');
    Route::delete('/tingkat/{id}', [TingkatController::class, 'destroy'])->name('tingkat.destroy');

   


    Route::get('/partisipasi', [PartisipasiController::class, 'index'])->name('partisipasi.index');
    Route::get('/partisipasi/create', [PartisipasiController::class, 'create'])->name('partisipasi.create');
    Route::post('/partisipasi', [PartisipasiController::class, 'store'])->name('partisipasi.store');
    Route::get('/partisipasi/{id}/edit', [PartisipasiController::class, 'edit'])->name('partisipasi.edit');
    Route::put('/partisipasi/{id}', [PartisipasiController::class, 'update'])->name('partisipasi.update');
    Route::delete('/partisipasi/{id}', [PartisipasiController::class, 'destroy'])->name('partisipasi.destroy');

    Route::get('/skoring-cv', [SkoringCvController::class, 'index'])->name('skoring_cv.index');
    Route::get('/skoring-cv/add', [SkoringCvController::class, 'create'])->name('skoring_cv.create');
    Route::post('/skoring-cv/add', [SkoringCvController::class, 'store'])->name('skoring_cv.store');
    Route::get('/skoring-cv/{id}/edit', [SkoringCvController::class, 'edit'])->name('skoring_cv.edit');
    Route::put('/skoring-cv/{id}', [SkoringCvController::class, 'update'])->name('skoring_cv.update');
    Route::delete('/skoring-cv/{id}', [SkoringCvController::class, 'destroy'])->name('skoring_cv.destroy');

    Route::get('/skoring', [SkoringController::class, 'index'])->name('skoring.index');
    Route::get('/skoring/add', [SkoringController::class, 'create'])->name('skoring.create');
    Route::post('/skoring/add', [SkoringController::class, 'store'])->name('skoring.store');
    Route::get('/skoring/{id}/edit', [SkoringController::class, 'edit'])->name('skoring.edit');
    Route::put('/skoring/{id}', [SkoringController::class, 'update'])->name('skoring.update');
    Route::delete('/skoring/{id}', [SkoringController::class, 'destroy'])->name('skoring.destroy');

     Route::get('/kriteria', [KriteriaController::class, 'index'])->name('kriteria.index');
    Route::get('/kriteria/create', [KriteriaController::class, 'create'])->name('kriteria.create');
    Route::post('/kriteria', [KriteriaController::class, 'store'])->name('kriteria.store');
    Route::get('/kriteria/{id}/edit', [KriteriaController::class, 'edit'])->name('kriteria.edit');
    Route::put('/kriteria/{id}', [KriteriaController::class, 'update'])->name('kriteria.update');
    Route::delete('/kriteria/{id}', [KriteriaController::class, 'destroy'])->name('kriteria.destroy');

    Route::get('/konten_setting', [KontenSettingController::class, 'index'])->name('konten_setting.index');
    Route::get('/konten_setting/create', [KontenSettingController::class, 'create'])->name('konten_setting.create');
    Route::post('/konten_setting', [KontenSettingController::class, 'store'])->name('konten_setting.store');
    Route::get('/konten_setting/{id}/edit', [KontenSettingController::class, 'edit'])->name('konten_setting.edit');
    Route::put('/konten_setting/{id}', [KontenSettingController::class, 'update'])->name('konten_setting.update');    
    Route::delete('/konten_setting/{id}', [KontenSettingController::class, 'destroy'])->name('konten_setting.destroy');

    Route::get('/poster', [PosterController::class, 'index'])->name('poster.index');
    Route::get('/poster/create', [PosterController::class, 'create'])->name('poster.create');
    Route::post('/poster', [PosterController::class, 'store'])->name('poster.store');
    Route::get('/poster/{id}/edit', [PosterController::class, 'edit'])->name('poster.edit');
    Route::put('/poster/{id}', [PosterController::class, 'update'])->name('poster.update');
    Route::delete('/poster/{id}', [PosterController::class, 'destroy'])->name('poster.destroy');

     Route::get('/poster/{id}/lihat', [PosterController::class, 'lihat'])->name('poster.lihat');

    Route::get('/album_foto', [App\Http\Controllers\AlbumFotoController::class, 'index'])->name('album_foto.index');
    Route::get('/album_foto/create', [App\Http\Controllers\AlbumFotoController::class, 'create'])->name('album_foto.create');
    Route::post('/album_foto', [App\Http\Controllers\AlbumFotoController::class, 'store'])->name('album_foto.store');
    Route::get('/album_foto/{id}/edit', [App\Http\Controllers\AlbumFotoController::class, 'edit'])->name('album_foto.edit');
    Route::put('/album_foto/{id}', [App\Http\Controllers\AlbumFotoController::class, 'update'])->name('album_foto.update');
    Route::delete('/album_foto/{id}', [App\Http\Controllers\AlbumFotoController::class, 'destroy'])->name('album_foto.destroy'); 
    
    Route::get('/publikasi', [App\Http\Controllers\PublikasiController::class, 'index'])->name('publikasi.index');
    Route::get('/publikasi/create', [App\Http\Controllers\PublikasiController::class, 'create'])->name('publikasi.create');
    Route::post('/publikasi', [App\Http\Controllers\PublikasiController::class, 'store'])->name('publikasi.store');
    Route::get('/publikasi/{id}/edit', [App\Http\Controllers\PublikasiController::class, 'edit'])->name('publikasi.edit');
    Route::put('/publikasi/{id}', [App\Http\Controllers\PublikasiController::class, 'update'])->name('publikasi.update');
    Route::delete('/publikasi/{id}', [App\Http\Controllers\PublikasiController::class, 'destroy'])->name('publikasi.destroy');











    



    Route::get('/tahun', [TahunController::class, 'index'])->name('tahun.index');
    Route::get('/tahun/add', [TahunController::class, 'create'])->name('tahun.add');
    Route::post('/tahun/add', [TahunController::class, 'store'])->name('tahun.store');
    Route::get('/tahun/edit/{id}', [TahunController::class, 'edit'])->name('tahun.edit');
    Route::put('/tahun/{id}', [TahunController::class, 'update'])->name('tahun.update');
    Route::delete('/tahun/{id}', [TahunController::class, 'destroy'])->name('tahun.destroy');

    Route::get('/satuan', [SatuanController::class, 'index'])->name('satuan.index');
    Route::get('/satuan/add', [SatuanController::class, 'create'])->name('satuan.add');
    Route::post('/satuan/add', [SatuanController::class, 'store'])->name('satuan.store');
    Route::get('/satuan/edit/{id}', [SatuanController::class, 'edit'])->name('satuan.edit');
    Route::put('/satuan/{id}', [SatuanController::class, 'update'])->name('satuan.update');
    Route::delete('/satuan/{id}', [SatuanController::class, 'destroy'])->name('satuan.destroy');

    Route::get('/mak', [MakController::class, 'index'])->name('mak.index');
    Route::get('/mak/add', [MakController::class, 'create'])->name('mak.add');
    Route::post('/mak/add', [MakController::class, 'store'])->name('mak.store');
    Route::get('/mak/edit/{id}', [MakController::class, 'edit'])->name('mak.edit');
    Route::put('/mak/{id}', [MakController::class, 'update'])->name('mak.update');
    Route::delete('/mak/{id}', [MakController::class, 'destroy'])->name('mak.destroy');

    Route::get('/jabatan', [JabatanController::class, 'index'])->name('jabatan.index');
    Route::get('/jabatan/add', [JabatanController::class, 'create'])->name('jabatan.add');
    Route::post('/jabatan/add', [JabatanController::class, 'store'])->name('jabatan.store');
    Route::get('/jabatan/edit/{id}', [JabatanController::class, 'edit'])->name('jabatan.edit');
    Route::put('/jabatan/{id}', [JabatanController::class, 'update'])->name('jabatan.update');
    Route::delete('/jabatan/{id}', [JabatanController::class, 'destroy'])->name('jabatan.destroy');

    Route::get('/kode-surat', [KodeSuratController::class, 'index'])->name('kode_surat.index');
    Route::get('/kode-surat/add', [KodeSuratController::class, 'create'])->name('kode_surat.add');
    Route::post('/kode-surat/add', [KodeSuratController::class, 'store'])->name('kode_surat.store');
    Route::get('/kode-surat/edit/{id}', [KodeSuratController::class, 'edit'])->name('kode_surat.edit');
    Route::put('/kode-surat/{id}', [KodeSuratController::class, 'update'])->name('kode_surat.update');
    Route::delete('/kode-surat/{id}', [KodeSuratController::class, 'destroy'])->name('kode_surat.destroy');

    Route::get('/klasifikasi-surat', [KlasifikasiSuratController::class, 'index'])->name('klasifikasi_surat.index');
    Route::get('/klasifikasi-surat/add', [KlasifikasiSuratController::class, 'create'])->name('klasifikasi_surat.add');
    Route::post('/klasifikasi-surat/add', [KlasifikasiSuratController::class, 'store'])->name('klasifikasi_surat.store');
    Route::get('/klasifikasi-surat/edit/{id}', [KlasifikasiSuratController::class, 'edit'])->name('klasifikasi_surat.edit');
    Route::put('/klasifikasi-surat/{id}', [KlasifikasiSuratController::class, 'update'])->name('klasifikasi_surat.update');
    Route::delete('/klasifikasi-surat/{id}', [KlasifikasiSuratController::class, 'destroy'])->name('klasifikasi_surat.destroy');

    Route::get('/kegiatan', [KegiatanController::class, 'index'])->name('kegiatan.index');
    Route::get('/kegiatan/create', [KegiatanController::class, 'create'])->name('kegiatan.create');
    Route::post('/kegiatan', [KegiatanController::class, 'store'])->name('kegiatan.store');
    Route::get('/kegiatan/{id}/edit', [KegiatanController::class, 'edit'])->name('kegiatan.edit');
    Route::put('/kegiatan/{id}', [KegiatanController::class, 'update'])->name('kegiatan.update');
    Route::delete('/kegiatan/{id}', [KegiatanController::class, 'destroy'])->name('kegiatan.destroy');

    Route::get('/informasi', [InformasiController::class, 'index'])->name('informasi.index');
    Route::get('/informasi/create', [InformasiController::class, 'create'])->name('informasi.create');
    Route::post('/informasi', [InformasiController::class, 'store'])->name('informasi.store');
    Route::get('/informasi/edit/{id}', [InformasiController::class, 'edit'])->name('informasi.edit');
    Route::put('/informasi/{id}', [InformasiController::class, 'update'])->name('informasi.update');
    Route::delete('/informasi/{id}', [InformasiController::class, 'destroy'])->name('informasi.destroy');

    Route::get('/skoring', [SkoringController::class, 'index'])->name('skoring.index');
    Route::get('/skoring/create', [SkoringController::class, 'create'])->name('skoring.create');
    Route::post('/skoring', [SkoringController::class, 'store'])->name('skoring.store');
    Route::get('/skoring/edit/{id}', [SkoringController::class, 'edit'])->name('skoring.edit');
    Route::put('/skoring/{id}', [SkoringController::class, 'update'])->name('skoring.update');
    Route::delete('/skoring/{id}', [SkoringController::class, 'destroy'])->name('skoring.destroy');

    Route::get('/arsip-perencanaan', [ArsipPerencanaanController::class, 'index'])->name('arsip_perencanaan.index');
    Route::get('/arsip-perencanaan/create', [ArsipPerencanaanController::class, 'create'])->name('arsip_perencanaan.create');
    Route::post('/arsip-perencanaan', [ArsipPerencanaanController::class, 'store'])->name('arsip_perencanaan.store');
    Route::get('/arsip-perencanaan/edit/{id}', [ArsipPerencanaanController::class, 'edit'])->name('arsip_perencanaan.edit');
    Route::put('/arsip-perencanaan/{id}', [ArsipPerencanaanController::class, 'update'])->name('arsip_perencanaan.update');
    Route::delete('/arsip-perencanaan/{id}', [ArsipPerencanaanController::class, 'destroy'])->name('arsip_perencanaan.destroy');
    Route::delete('/arsip-perencanaan/{id}/file', [ArsipPerencanaanController::class, 'deleteFile'])->name('arsip_perencanaan.delete_file');
    Route::get('/arsip-perencanaan/{id}/download', [ArsipPerencanaanController::class, 'downloadFile'])->name('arsip_perencanaan.download');

    // Surat Masuk Perencanaan routes
    Route::get('/surat-masuk-perencanaan', [SuratMasukPerencanaanController::class, 'index'])->name('surat_masuk_perencanaan.index');
    Route::get('/surat-masuk-perencanaan/create', [SuratMasukPerencanaanController::class, 'create'])->name('surat_masuk_perencanaan.create');
    Route::post('/surat-masuk-perencanaan', [SuratMasukPerencanaanController::class, 'store'])->name('surat_masuk_perencanaan.store');
    Route::get('/surat-masuk-perencanaan/{id}/edit', [SuratMasukPerencanaanController::class, 'edit'])->name('surat_masuk_perencanaan.edit');
    Route::put('/surat-masuk-perencanaan/{id}', [SuratMasukPerencanaanController::class, 'update'])->name('surat_masuk_perencanaan.update');
    Route::delete('/surat-masuk-perencanaan/{id}', [SuratMasukPerencanaanController::class, 'destroy'])->name('surat_masuk_perencanaan.destroy');
    Route::get('/surat-masuk-perencanaan/{id}/file/delete', [SuratMasukPerencanaanController::class, 'deleteFile'])->name('surat_masuk_perencanaan.delete_file');
    Route::get('/surat-masuk-perencanaan/{id}/keterangan/delete', [SuratMasukPerencanaanController::class, 'deleteKeteranganFile'])->name('surat_masuk_perencanaan.delete_keterangan_file');
    Route::get('/surat-masuk-perencanaan/{id}/arsip/delete', [SuratMasukPerencanaanController::class, 'deleteArsipFile'])->name('surat_masuk_perencanaan.delete_arsip_file');
    
    // Format seperti yang diminta: Route::get('foto/{id}/{jenis}/delete', ...)
    Route::get('/surat-masuk-perencanaan/{id}/{jenis}/delete', [SuratMasukPerencanaanController::class, 'deleteFileByJenis'])->name('surat_masuk_perencanaan.delete_file_by_jenis');
    Route::get('/surat-masuk-perencanaan/{id}/download', [SuratMasukPerencanaanController::class, 'downloadFile'])->name('surat_masuk_perencanaan.download');
    Route::get('/surat-masuk-perencanaan/{id}/download-arsip', [SuratMasukPerencanaanController::class, 'downloadArsipFile'])->name('surat_masuk_perencanaan.download_arsip');
    
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
