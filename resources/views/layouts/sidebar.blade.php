<div class="sidebar">
    <div class="sidebar-header">
        <a href="{{ asset('template/dist/dashboard/sales.html') }}" class="sidebar-logo">Perencanaan</a>
    </div><div id="sidebarMenu" class="sidebar-body">

        <div class="nav-group show">
            <a href="#" class="nav-label">Dashboard</a>
            <ul class="nav nav-sidebar">
                <li class="nav-item">
                    <a href="{{ route('admin.dashboard.index') }}" class="nav-link {{ request()->routeIs('admin.dashboard.index') ? 'active' : '' }}"><i
                            class="ri-pie-chart-2-line"></i> <span>Dashboard Utama</span></a>
                </li>
            </ul>
        </div><div class="nav-group show">
            <a href="#" class="nav-label">Manajemen Lowongan</a>
            <ul class="nav nav-sidebar">
                <li class="nav-item {{ request()->routeIs('admin.lowongan.*') ? 'active' : '' }}">
                    <a href="{{ route('admin.lowongan.index') }}" class="nav-link {{ request()->routeIs('admin.lowongan.*') ? 'active' : '' }}"><i class="ri-briefcase-4-line"></i> <span>Daftar Lowongan</span></a>
                </li>
                 <li class="nav-item {{ request()->routeIs('admin.periode_magang.*', 'admin.kategori_lowongan.*', 'admin.jenjang_pendidikan.*', 'admin.jurusan.*') ? 'active' : '' }}">
                    <a href="" class="nav-link has-sub {{ request()->routeIs('admin.periode_magang.*', 'admin.kategori_lowongan.*', 'admin.jenjang_pendidikan.*', 'admin.jurusan.*') ? 'active show' : '' }}"><i class="ri-folder-settings-line"></i> <span>Master Lowongan</span></a>
                    <nav class="nav nav-sub {{ request()->routeIs('admin.periode_magang.*', 'admin.kategori_lowongan.*', 'admin.jenjang_pendidikan.*', 'admin.jurusan.*') ? 'active show' : '' }}">
                        <a href="{{ route('admin.periode_magang.index') }}" class="nav-sub-link {{ request()->routeIs('admin.periode_magang.*') ? 'active' : '' }}">Periode Magang</a>
                        <a href="{{ route('admin.kategori_lowongan.index') }}" class="nav-sub-link {{ request()->routeIs('admin.kategori_lowongan.*') ? 'active' : '' }}">Kategori Posisi</a>
                        <a href="{{ route('admin.jenjang_pendidikan.index') }}" class="nav-sub-link {{ request()->routeIs('admin.jenjang_pendidikan.*') ? 'active' : '' }}">Jenjang Pendidikan</a>
                        <a href="{{ route('admin.jurusan.index') }}" class="nav-sub-link {{ request()->routeIs('admin.jurusan.*') ? 'active' : '' }}">Jurusan</a>
                    </nav>
                </li>
            </ul>
        </div><div class="nav-group show">
            <a href="#" class="nav-label">Data Master</a>
            <ul class="nav nav-sidebar">
                <li class="nav-item {{ request()->routeIs('admin.tahun.*', 'admin.mak.*', 'admin.satuan_kerja.*') ? 'active' : '' }}">
                    <a href="" class="nav-link has-sub {{ request()->routeIs('admin.tahun.*', 'admin.mak.*', 'admin.satuan_kerja.*') ? 'active show' : '' }}"><i class="ri-database-2-line"></i> <span>Data
                            Administrasi</span></a>
                    <nav class="nav nav-sub {{ request()->routeIs('admin.tahun.*', 'admin.mak.*', 'admin.satuan_kerja.*') ? 'active show' : '' }}">
                        <a href="" class="nav-sub-link {{ request()->routeIs('admin.tahun.*') ? 'active' : '' }}">Tahun</a>
                        <a href="" class="nav-sub-link {{ request()->routeIs('admin.mak.*') ? 'active' : '' }}">MAK</a>
                        <a href="{{ route('admin.satuan_kerja.index') }}" class="nav-sub-link {{ request()->routeIs('admin.satuan_kerja.*') ? 'active' : '' }}">Satuan Kerja</a>
                    </nav>
                </li>
                <li class="nav-item {{ request()->routeIs('admin.kode_surat.*', 'admin.klasifikasi_surat.*') ? 'active' : '' }}">
                    <a href="" class="nav-link has-sub {{ request()->routeIs('admin.kode_surat.*', 'admin.klasifikasi_surat.*') ? 'active show' : '' }}"><i class="ri-book-3-line"></i> <span>Referensi Persuratan</span></a>
                    <nav class="nav nav-sub {{ request()->routeIs('admin.kode_surat.*', 'admin.klasifikasi_surat.*') ? 'active show' : '' }}">
                        <a href="" class="nav-sub-link {{ request()->routeIs('admin.kode_surat.*') ? 'active' : '' }}">Kode Surat</a>
                        <a href="" class="nav-sub-link {{ request()->routeIs('admin.klasifikasi_surat.*') ? 'active' : '' }}">Klasifikasi Surat</a>
                    </nav>
                </li>
                 <li class="nav-item">
                    <a href="" class="nav-link has-sub"><i class="ri-money-dollar-box-line"></i> <span>Data SBM</span></a>
                    <nav class="nav nav-sub">
                        <a href="{{ asset('template/dist/apps/gallery-music.html') }}" class="nav-sub-link">SBM (SBMe)</a>
                        <a href="{{ asset('template/dist/apps/gallery-music.html') }}" class="nav-sub-link">SBM (SBMbt)</a>
                    </nav>
                </li>
            </ul>
        </div><div class="nav-group show">
            <a href="#" class="nav-label">Manajemen SDM</a>
            <ul class="nav nav-sidebar">
                <li class="nav-item {{ request()->routeIs('admin.jabatan.*', 'admin.user.*') ? 'active' : '' }}">
                    <a href="" class="nav-link has-sub {{ request()->routeIs('admin.jabatan.*', 'admin.user.*') ? 'active show' : '' }}"><i class="ri-group-line"></i> <span>User & Jabatan</span></a>
                    <nav class="nav nav-sub {{ request()->routeIs('admin.jabatan.*', 'admin.user.*') ? 'active show' : '' }}">
                        <a href="{{ route('admin.user.index') }}" class="nav-sub-link {{ request()->routeIs('admin.user.*') ? 'active' : '' }}">Pengguna</a>
                        <a href="" class="nav-sub-link {{ request()->routeIs('admin.jabatan.*') ? 'active' : '' }}">Jabatan</a>
                    </nav>
                </li>
                <li class="nav-item {{ request()->routeIs('admin.peserta_magang.*') ? 'active' : '' }}">
                    <a href="{{ route('admin.peserta_magang.index') }}" class="nav-link {{ request()->routeIs('admin.peserta_magang.*') ? 'active' : '' }}"><i class="ri-graduation-cap-line"></i> <span>Peserta Magang</span></a>
                </li>
                <li class="nav-item">
                    <a href="" class="nav-link has-sub"><i class="ri-user-switch-line"></i> <span>Login
                            Sebagai</span></a>
                    <nav class="nav nav-sub">
                        <a href="" class="nav-sub-link">Eyang
                            Sincan</a>
                        <a href=""
                            class="nav-sub-link">Perencanaan</a>
                        <a href="" class="nav-sub-link">Staff
                            PPK</a>
                        <a href="" class="nav-sub-link">PPK</a>
                        <a href="{{ asset('template/dist/apps/gallery-video.html') }}" class="nav-sub-link">Staff Unit
                            Kerja</a>
                        <a href="{{ asset('template/dist/apps/gallery-video.html') }}" class="nav-sub-link">Timeline</a>
                    </nav>
                </li>
            </ul>
        </div><div class="nav-group show">
            <a href="#" class="nav-label">Persuratan & Arsip</a>
            <ul class="nav nav-sidebar">
                <li class="nav-item {{ request()->routeIs('admin.arsip_perencanaan.*', 'admin.surat_masuk_perencanaan.*') ? 'active' : '' }}">
                    <a href="" class="nav-link has-sub {{ request()->routeIs('admin.arsip_perencanaan.*', 'admin.surat_masuk_perencanaan.*') ? 'active show' : '' }}"><i class="ri-inbox-archive-line"></i> <span>Arsip & Surat</span></a>
                    <nav class="nav nav-sub {{ request()->routeIs('admin.arsip_perencanaan.*', 'admin.surat_masuk_perencanaan.*') ? 'active show' : '' }}">
                        <a href="" class="nav-sub-link {{ request()->routeIs('admin.arsip_perencanaan.*') ? 'active' : '' }}">Arsip Perencanaan</a>
                        <a href="" class="nav-sub-link {{ request()->routeIs('admin.surat_masuk_perencanaan.*') ? 'active' : '' }}">Surat Masuk</a>
                        <a href="{{ asset('template/dist/apps/gallery-video.html') }}" class="nav-sub-link">Surat Keluar</a>
                    </nav>
                </li>
                 <li class="nav-item">
                    <a href="" class="nav-link has-sub"><i class="ri-file-edit-line"></i> <span>Data Revisi</span></a>
                    <nav class="nav nav-sub">
                        <a href="{{ asset('template/dist/apps/gallery-music.html') }}" class="nav-sub-link">Surat Pengajuan Revisi</a>
                        <a href="{{ asset('template/dist/apps/gallery-music.html') }}" class="nav-sub-link">Nota Dinas Revisi</a>
                    </nav>
                </li>
            </ul>
        </div><div class="nav-group show">
            <a href="#" class="nav-label">Perencanaan & Anggaran</a>
            <ul class="nav nav-sidebar">
                 <li class="nav-item {{ request()->routeIs('admin.informasi.*', 'admin.skoring.*') ? 'active' : '' }}">
                    <a href="" class="nav-link has-sub {{ request()->routeIs('admin.informasi.*', 'admin.skoring.*') ? 'active show' : '' }}"><i class="ri-file-text-line"></i> <span>Pembuatan TOR</span></a>
                    <nav class="nav nav-sub {{ request()->routeIs('admin.informasi.*', 'admin.skoring.*') ? 'active show' : '' }}">
                        <a href="" class="nav-sub-link {{ request()->routeIs('admin.informasi.*') ? 'active' : '' }}">Informasi</a>
                        <a href="" class="nav-sub-link">Term Of Reference (TOR)</a>
                        <a href="" class="nav-sub-link">Rincian Anggaran Biaya</a>
                        <a href="" class="nav-sub-link {{ request()->routeIs('admin.skoring.*') ? 'active' : '' }}">Skoring</a>
                    </nav>
                </li>
                <li class="nav-item">
                    <a href="" class="nav-link has-sub"><i class="ri-file-shield-2-line"></i> <span>Data Perjanjian
                            Kerja</span></a>
                    <nav class="nav nav-sub">
                        <a href="{{ asset('template/dist/apps/gallery-music.html') }}" class="nav-sub-link">Perjanjian Kerja</a>
                        <a href="{{ asset('template/dist/apps/gallery-music.html') }}" class="nav-sub-link">Kamus Indikator</a>
                    </nav>
                </li>
                <li class="nav-item">
                    <a href="" class="nav-link has-sub"><i class="ri-currency-fill"></i> <span>Daftar Usulan</span></a>
                    <nav class="nav nav-sub">
                        <a href="{{ asset('template/dist/pages/profile.html') }}" class="nav-sub-link">Struktur Anggaran</a>
                        <a href="{{ asset('template/dist/pages/people.html') }}" class="nav-sub-link">Form Belanja</a>
                    </nav>
                </li>
                <li class="nav-item">
                    <a href="" class="nav-link has-sub"><i class="ri-currency-fill"></i> <span>Daftar Pagu Indikatif</span></a>
                    <nav class="nav nav-sub">
                        <a href="{{ asset('template/dist/pages/profile.html') }}" class="nav-sub-link">Struktur Anggaran</a>
                        <a href="{{ asset('template/dist/pages/people.html') }}" class="nav-sub-link">Form Belanja</a>
                        <a href="{{ asset('template/dist/pages/people.html') }}" class="nav-sub-link">Pembatasan Pagu</a>
                    </nav>
                </li>
                <li class="nav-item">
                    <a href="" class="nav-link has-sub"><i class="ri-currency-fill"></i> <span>Daftar Pagu Anggaran</span></a>
                    <nav class="nav nav-sub">
                        <a href="{{ asset('template/dist/pages/profile.html') }}" class="nav-sub-link">Struktur Anggaran</a>
                        <a href="{{ asset('template/dist/pages/people.html') }}" class="nav-sub-link">Form Belanja</a>
                        <a href="{{ asset('template/dist/pages/people.html') }}" class="nav-sub-link">Pembatasan Pagu</a>
                    </nav>
                </li>
                <li class="nav-item">
                    <a href="" class="nav-link has-sub"><i class="ri-currency-fill"></i> <span>Daftar Alokasi Anggaran</span></a>
                    <nav class="nav nav-sub">
                        <a href="{{ asset('template/dist/pages/profile.html') }}" class="nav-sub-link">Struktur Anggaran</a>
                        <a href="{{ asset('template/dist/pages/people.html') }}" class="nav-sub-link">Form Belanja</a>
                        <a href="{{ asset('template/dist/pages/people.html') }}" class="nav-sub-link">Pembatasan Pagu</a>
                    </nav>
                </li>
                <li class="nav-item">
                    <a href="" class="nav-link has-sub"><i class="ri-currency-fill"></i> <span>Daftar DIPA</span></a>
                    <nav class="nav nav-sub">
                        <a href="{{ asset('template/dist/pages/profile.html') }}" class="nav-sub-link">Struktur Anggaran</a>
                        <a href="{{ asset('template/dist/pages/people.html') }}" class="nav-sub-link">Form Belanja</a>
                        <a href="{{ asset('template/dist/pages/people.html') }}" class="nav-sub-link">Tranfer ke SIREVI</a>
                    </nav>
                </li>
            </ul>
        </div><div class="nav-group show mb-3">
            <a href="#" class="nav-label">Laporan & Sicaping</a>
            <ul class="nav nav-sidebar">
                <li class="nav-item">
                    <a href="" class="nav-link has-sub"><i class="ri-bar-chart-2-line"></i> <span>Laporan</span></a>
                    <nav class="nav nav-sub">
                        <a href="{{ asset('template/dist/docs/layout-grid.html') }}" class="nav-sub-link">RAB</a>
                        <a href="{{ asset('template/dist/docs/layout-columns.html') }}" class="nav-sub-link">Jumlah Per Satker</a>
                        <a href="{{ asset('template/dist/docs/layout-gutters.html') }}" class="nav-sub-link">Jumlah Per Program</a>
                        <a href="{{ asset('template/dist/docs/layout-gutters.html') }}" class="nav-sub-link">Jumlah Per Kegiatan</a>
                        <a href="{{ asset('template/dist/docs/layout-gutters.html') }}" class="nav-sub-link">Jumlah Per Output</a>
                        <a href="{{ asset('template/dist/docs/layout-gutters.html') }}" class="nav-sub-link">Jumlah Per Biro</a>
                        <a href="{{ asset('template/dist/docs/layout-gutters.html') }}" class="nav-sub-link">Jumlah Per Akun</a>
                    </nav>
                </li>
                <li class="nav-item">
                    <a href="" class="nav-link has-sub"><i class="ri-pie-chart-line"></i> <span>Statistik</span></a>
                    <nav class="nav nav-sub">
                        <a href="{{ asset('template/dist/docs/chart-flot.html') }}" class="nav-sub-link">Jumlah Per Satker</a>
                        <a href="{{ asset('template/dist/docs/chart-apex.html') }}" class="nav-sub-link">Jumlah Per Program</a>
                        <a href="{{ asset('template/dist/docs/chart-chartjs.html') }}" class="nav-sub-link">Jumlah Per Kegiatan</a>
                        <a href="{{ asset('template/dist/docs/chart-peity.html') }}" class="nav-sub-link">Jumlah Per Output</a>
                        <a href="{{ asset('template/dist/docs/chart-morris.html') }}" class="nav-sub-link">Jumlah Per Biro</a>
                        <a href="{{ asset('template/dist/docs/chart-morris.html') }}" class="nav-sub-link">Jumlah Per Akun</a>
                    </nav>
                </li>
                <li class="nav-item">
                    <a href="" class="nav-link has-sub"><i class="ri-bar-chart-horizontal-line"></i> <span>Laporan Kustom</span></a>
                    <nav class="nav nav-sub">
                        <a href="{{ asset('template/dist/docs/chart-flot.html') }}" class="nav-sub-link">Daftar Laporan Kustom</a>
                        <a href="{{ asset('template/dist/docs/chart-apex.html') }}" class="nav-sub-link">Tambah Laporan Kustom</a>
                    </nav>
                </li>
                 <li class="nav-item">
                    <a href="" class="nav-link has-sub"><i class="ri-bar-chart-box-line"></i> <span>SICAPING: Referensi</span></a>
                    <nav class="nav nav-sub">
                        <a href="{{ asset('template/dist/docs/layout-grid.html') }}" class="nav-sub-link">Setting Persentase</a>
                    </nav>
                </li>
                <li class="nav-item">
                    <a href="" class="nav-link has-sub"><i class="ri-bar-chart-box-line"></i> <span>SICAPING: Data</span></a>
                    <nav class="nav nav-sub">
                        <a href="{{ asset('template/dist/docs/chart-flot.html') }}" class="nav-sub-link">Pagu Indikatif</a>
                        <a href="{{ asset('template/dist/docs/chart-apex.html') }}" class="nav-sub-link">Pagu Anggaran</a>
                        <a href="{{ asset('template/dist/docs/chart-chartjs.html') }}" class="nav-sub-link">Alokasi Anggaran</a>
                    </nav>
                </li>
                <li class="nav-item">
                    <a href="" class="nav-link has-sub"><i class="ri-bar-chart-box-line"></i> <span>SICAPING: Laporan</span></a>
                    <nav class="nav nav-sub">
                        <a href="{{ asset('template/dist/docs/chart-flot.html') }}" class="nav-sub-link">RAB</a>
                        <a href="{{ asset('template/dist/docs/chart-apex.html') }}" class="nav-sub-link">Jumlah Per Akun</a>
                        <a href="{{ asset('template/dist/docs/chart-apex.html') }}" class="nav-sub-link">Jumlah Per Komponen</a>
                        <a href="{{ asset('template/dist/docs/chart-apex.html') }}" class="nav-sub-link">Jumlah Per Output/KRO</a>
                        <a href="{{ asset('template/dist/docs/chart-apex.html') }}" class="nav-sub-link">Jumlah Per Kegiatan</a>
                        <a href="{{ asset('template/dist/docs/chart-apex.html') }}" class="nav-sub-link">Jumlah Per Program</a>
                        <a href="{{ asset('template/dist/docs/chart-apex.html') }}" class="nav-sub-link">Jumlah Per Satker</a>
                        <a href="{{ asset('template/dist/docs/chart-apex.html') }}" class="nav-sub-link">Jumlah Per Biro</a>
                    </nav>
                </li>
            </ul>
        </div></div><div class="sidebar-footer">
        <div class="sidebar-footer-top">
            <div class="sidebar-footer-thumb">
                <img src="{{ asset('template/dist/assets/img/img1.jpg') }}" alt="">
            </div><div class="sidebar-footer-body">
                <h6><a href="{{ asset('template/dist/pages/profile.html') }}">Shaira Diaz</a></h6>
                <p>Premium Member</p>
            </div><a id="sidebarFooterMenu" href="" class="dropdown-link"><i class="ri-arrow-down-s-line"></i></a>
        </div><div class="sidebar-footer-menu">
            <nav class="nav">
                <a href=""><i class="ri-edit-2-line"></i> Edit Profile</a>
                <a href=""><i class="ri-profile-line"></i> View Profile</a>
            </nav>
            <hr>
            <nav class="nav">
                <a href=""><i class="ri-question-line"></i> Help Center</a>
                <a href=""><i class="ri-lock-line"></i> Privacy Settings</a>
                <a href=""><i class="ri-user-settings-line"></i> Account Settings</a>
                <a href="{{ route('logout') }}"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="ri-logout-box-r-line"></i> Keluar
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </nav>
        </div></div></div>```