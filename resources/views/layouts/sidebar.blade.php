<div class="sidebar">
    <div class="sidebar-header">
        <a href="{{ route('admin.dashboard.index') }}" class="sidebar-logo">Perencanaan</a>
    </div>
    <div id="sidebarMenu" class="sidebar-body">

        <div class="nav-group show">
            <a href="#" class="nav-label">Dashboard</a>
            <ul class="nav nav-sidebar">
                <li class="nav-item">
                    <a href="{{ route('admin.dashboard.index') }}" class="nav-link {{ request()->routeIs('admin.dashboard.index') ? 'active' : '' }}"><i class="ri-pie-chart-2-line"></i> <span>Dashboard Utama</span></a>
                </li>
            </ul>
        </div>

        <div class="nav-group show">
            <a href="#" class="nav-label">Manajemen Lowongan</a>
            <ul class="nav nav-sidebar">
                <li class="nav-item {{ request()->routeIs('admin.lowongan.*') ? 'active' : '' }}">
                    <a href="{{ route('admin.lowongan.index') }}" class="nav-link {{ request()->routeIs('admin.lowongan.*') ? 'active' : '' }}"><i class="ri-briefcase-4-line"></i> <span>Daftar Lowongan</span></a>
                </li>
                <li class="nav-item {{ request()->routeIs('admin.pendaftaran.*') ? 'active' : '' }}">
                    <a href="{{ route('admin.pendaftaran.index') }}" class="nav-link {{ request()->routeIs('admin.pendaftaran.*') ? 'active' : '' }}"><i class="ri-file-list-3-line"></i> <span>Daftar Pendaftaran</span></a>
                </li>
                <li class="nav-item {{ request()->routeIs('admin.dokumen.*') ? 'active' : '' }}">
                    <a href="{{ route('admin.dokumen.index') }}" class="nav-link {{ request()->routeIs('admin.dokumen.*') ? 'active' : '' }}"><i class="ri-folder-3-line"></i> <span>Dokumen Pelamar</span></a>
                </li>
                <li class="nav-item {{ request()->routeIs('admin.periode_magang.*', 'admin.kategori_lowongan.*', 'admin.jenjang_pendidikan.*', 'admin.jurusan.*') ? 'active' : '' }}">
                    <a href="javascript:;" class="nav-link has-sub {{ request()->routeIs('admin.periode_magang.*', 'admin.kategori_lowongan.*', 'admin.jenjang_pendidikan.*', 'admin.jurusan.*') ? 'active show' : '' }}"><i class="ri-folder-settings-line"></i> <span>Master Lowongan</span></a>
                    <nav class="nav nav-sub {{ request()->routeIs('admin.periode_magang.*', 'admin.kategori_lowongan.*', 'admin.jenjang_pendidikan.*', 'admin.jurusan.*') ? 'active show' : '' }}">
                        <a href="{{ route('admin.periode_magang.index') }}" class="nav-sub-link {{ request()->routeIs('admin.periode_magang.*') ? 'active' : '' }}">Periode Magang</a>
                        <a href="{{ route('admin.kategori_lowongan.index') }}" class="nav-sub-link {{ request()->routeIs('admin.kategori_lowongan.*') ? 'active' : '' }}">Kategori Posisi</a>
                        <a href="{{ route('admin.jenjang_pendidikan.index') }}" class="nav-sub-link {{ request()->routeIs('admin.jenjang_pendidikan.*') ? 'active' : '' }}">Jenjang Pendidikan</a>
                        <a href="{{ route('admin.jurusan.index') }}" class="nav-sub-link {{ request()->routeIs('admin.jurusan.*') ? 'active' : '' }}">Jurusan</a>
                    </nav>
                </li>
            </ul>
        </div>

        <div class="nav-group show">
            <a href="#" class="nav-label">Data Master</a>
            <ul class="nav nav-sidebar">
                <li class="nav-item {{ request()->routeIs('admin.satuan_kerja.*') ? 'active' : '' }}">
                    <a href="{{ route('admin.satuan_kerja.index') }}" class="nav-link {{ request()->routeIs('admin.satuan_kerja.*') ? 'active' : '' }}"><i class="ri-database-2-line"></i> <span>Satuan Kerja</span></a>
                </li>
                <li class="nav-item {{ request()->routeIs('admin.user.*') ? 'active' : '' }}">
                    <a href="{{ route('admin.user.index') }}" class="nav-link {{ request()->routeIs('admin.user.*') ? 'active' : '' }}"><i class="ri-group-line"></i> <span>Pengguna</span></a>
                </li>
            </ul>
        </div>

        <div class="nav-group show">
            <a href="#" class="nav-label">Manajemen SDM</a>
            <ul class="nav nav-sidebar">
                <li class="nav-item {{ request()->routeIs('admin.peserta_magang.*') ? 'active' : '' }}">
                    <a href="{{ route('admin.peserta_magang.index') }}" class="nav-link {{ request()->routeIs('admin.peserta_magang.*') ? 'active' : '' }}"><i class="ri-graduation-cap-line"></i> <span>Peserta Magang</span></a>
                </li>
            </ul>
        </div>

    </div>

    <div class="sidebar-footer">
        <div class="sidebar-footer-top">
            <div class="sidebar-footer-thumb">
                <img src="{{ asset('template/dist/assets/img/img1.jpg') }}" alt="">
            </div>
            <div class="sidebar-footer-body">
                <h6><a href="#">Admin</a></h6>
                <p>Administrator</p>
            </div>
            <a id="sidebarFooterMenu" href="javascript:;" class="dropdown-link"><i class="ri-arrow-down-s-line"></i></a>
        </div>
        <div class="sidebar-footer-menu">
            <nav class="nav">
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="ri-logout-box-r-line"></i> Keluar</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">@csrf</form>
            </nav>
        </div>
    </div>
</div>