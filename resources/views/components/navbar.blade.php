<!doctype html>
<html lang="id">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">

  </head>

  <body>
    <nav id="main-navbar" class="bg-[#007E5D] shadow transition-shadow duration-300 sticky top-0 z-50">
      <div class="max-w-7xl mx-auto px-6">
        <div class="flex justify-between items-center h-20">
          <!-- Logo & Judul -->
          <div class="flex items-center gap-4">
            <img src="{{ asset('images/logo_setjen.png') }}" alt="Logo DPR" class="h-14 w-auto drop-shadow-md">
            <div class="leading-tight">
              <h1 class="text-white font-bold italic text-base md:text-lg tracking-wide">
                Dewan Perwakilan Rakyat
              </h1>
              <p class="text-white text-xs italic opacity-80">Sistem Informasi Magang</p>
            </div>
          </div>
          <!-- Menu Utama -->
          <div class="hidden md:flex items-center gap-8 text-white font-light text-base">
            <a href="/" class="group relative py-2 transition">
              <span class="hover:text-yellow-300 transition">Beranda</span>
              <span class="absolute left-0 -bottom-1 w-0 h-0.5 bg-yellow-300 transition-all duration-300 group-hover:w-full"></span>
            </a>
            <a href="/tentang-kami" class="group relative py-2 transition">
              <span class="hover:text-yellow-300 transition">Tentang Kami</span>
              <span class="absolute left-0 -bottom-1 w-0 h-0.5 bg-yellow-300 transition-all duration-300 group-hover:w-full"></span>
            </a>
            <a href="/lowongan" class="group relative py-2 transition">
              <span class="hover:text-yellow-300 transition">Cari Lowongan</span>
              <span class="absolute left-0 -bottom-1 w-0 h-0.5 bg-yellow-300 transition-all duration-300 group-hover:w-full"></span>
            </a>
            <a href="/satuan-kerja" class="group relative py-2 transition">
              <span class="hover:text-yellow-300 transition">Satuan Kerja</span>
              <span class="absolute left-0 -bottom-1 w-0 h-0.5 bg-yellow-300 transition-all duration-300 group-hover:w-full"></span>
            </a>
            <a href="hubungi-kami" class="group relative py-2 transition">
              <span class="hover:text-yellow-300 transition">Hubungi Kami</span>
              <span class="absolute left-0 -bottom-1 w-0 h-0.5 bg-yellow-300 transition-all duration-300 group-hover:w-full"></span>
            </a>
            
              @guest
                <a href="{{ route('login') }}" class="bg-white text-black px-6 py-2 rounded-full flex items-center gap-2 font-medium shadow hover:bg-gray-100 transition">
                  <i class="fa-solid fa-right-to-bracket mr-2"></i> Login
                </a>
              @else
                @php
                  $u = Auth::user();
                  if (method_exists($u, 'isAdmin')) {
                    $isAdmin = $u->isAdmin();
                  } else {
                    $isAdmin = (!empty($u->id_role) && $u->id_role == 1) || (!empty($u->role) && strtolower($u->role) === 'admin');
                  }
                  // avatar source: prefer `avatar` attribute if present, otherwise use ui-avatars service as placeholder
                  $avatarSrc = property_exists($u, 'avatar') && !empty($u->avatar) ? $u->avatar : 'https://ui-avatars.com/api/?name=' . urlencode($u->name) . '&background=0D9488&color=fff&rounded=true&size=128';
                @endphp

                <div class="relative">
                  <button id="profile-dropdown-btn" class="flex items-center gap-2 focus:outline-none border border-white/20 bg-white/5 px-3 py-1 rounded-full" aria-expanded="false">
                    <img src="{{ $avatarSrc }}" alt="{{ $u->name }}" class="h-10 w-10 rounded-full ring-2 ring-white shadow-sm object-cover" />
                    <span class="hidden md:inline-block ml-3 text-white font-medium truncate max-w-[10rem]">{{ $u->name }}</span>
                    <svg class="hidden md:inline-block ml-1 w-3 h-3 text-white" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                      <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.584l3.71-4.352a.75.75 0 111.14.98l-4.25 5a.75.75 0 01-1.14 0l-4.25-5a.75.75 0 01.02-1.06z" clip-rule="evenodd" />
                    </svg>
                  </button>

                  <div id="profile-dropdown-menu" class="hidden absolute right-0 mt-2 w-44 bg-white rounded-md shadow-lg py-2 z-50">
                    @if($isAdmin)
                      <a href="{{ route('admin.dashboard.index') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Dashboard</a>
                      <a href="{{ route('admin.dokumen.index') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Dokumen</a>
                    @else
                      <a href="{{ route('profile') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Profile</a>
                    @endif
                    <form method="POST" action="{{ route('logout') }}">
                      @csrf
                      <button type="submit" class="w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Logout</button>
                    </form>
                  </div>
                </div>
              @endguest
           
          </div>
          <!-- Tombol Mobile -->
          <div class="md:hidden">
            <button id="menu-toggle" class="text-white focus:outline-none">
              <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
              </svg>
            </button>
          </div>
        </div>
      </div>
      <!-- Menu Mobile -->
      <div id="mobile-menu" class="hidden md:hidden bg-[#007E5D] border-t border-white/20 transition-all duration-300">
        <div class="px-4 py-3 space-y-2 text-white text-base">
          <a href="/" class="block px-3 py-2 rounded hover:text-yellow-300">Beranda</a>
          <a href="/tentang-kami" class="block px-3 py-2 rounded hover:text-yellow-300">Tentang Kami</a>
          <a href="/lowongan" class="block px-3 py-2 rounded hover:text-yellow-300">Cari Lowongan</a>
          <a href="/satuan-kerja" class="block px-3 py-2 rounded hover:text-yellow-300">Satuan Kerja</a>
          <a href="/hubungi-kami" class="block px-3 py-2 rounded hover:text-yellow-300">Hubungi Kami</a>
          @guest
            <a href="{{ route('login') }}" class="block text-center bg-white text-[#007E5D] font-medium px-4 py-2 rounded-full shadow hover:bg-gray-100 transition">Login</a>
          @else
            @php
              $u = Auth::user();
              $avatarSrc = property_exists($u, 'avatar') && !empty($u->avatar) ? $u->avatar : 'https://ui-avatars.com/api/?name=' . urlencode($u->name) . '&background=0D9488&color=fff&rounded=true&size=128';
              if (method_exists($u, 'isAdmin')) {
                $isAdminMobile = $u->isAdmin();
              } else {
                $isAdminMobile = (!empty($u->id_role) && $u->id_role == 1) || (!empty($u->role) && strtolower($u->role) === 'admin');
              }
            @endphp

            <div class="mt-2">
              <a href="{{ $isAdminMobile ? route('admin.dashboard.index') : route('profile') }}" class="w-full flex items-center gap-3 border border-white/20 rounded-full px-3 py-2 bg-white/5">
                <img src="{{ $avatarSrc }}" alt="{{ $u->name }}" class="h-10 w-10 rounded-full ring-2 ring-white shadow-sm object-cover" />
                <div class="flex-1">
                  <div class="text-sm font-medium text-white truncate">{{ $u->name }}</div>
                  <div class="text-xs text-white/80 truncate">{{ $u->email }}</div>
                </div>
                <svg class="w-4 h-4 text-white/90" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                  <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.584l3.71-4.352a.75.75 0 111.14.98l-4.25 5a.75.75 0 01-1.14 0l-4.25-5a.75.75 0 01.02-1.06z" clip-rule="evenodd" />
                </svg>
              </a>

              <div class="mt-2 space-y-1">
                @if($isAdminMobile)
                  <a href="{{ route('admin.dashboard.index') }}" class="block px-3 py-2 rounded hover:text-yellow-300">Dashboard</a>
                  <a href="{{ route('admin.dokumen.index') }}" class="block px-3 py-2 rounded hover:text-yellow-300">Dokumen</a>
                @else
                  <a href="{{ route('profile') }}" class="block px-3 py-2 rounded hover:text-yellow-300">Profile</a>
                @endif

                <form method="POST" action="{{ route('logout') }}">
                  @csrf
                  <button type="submit" class="w-full text-left px-3 py-2 rounded hover:text-yellow-300">Logout</button>
                </form>
              </div>
            </div>
          @endguest
        </div>
      </div>
      <script>
        // Toggle mobile menu
        document.getElementById('menu-toggle').addEventListener('click', () => {
          const menu = document.getElementById('mobile-menu');
          menu.classList.toggle('hidden');
          menu.classList.toggle('block');
        });
        // Shadow on scroll
        window.addEventListener('scroll', function() {
          const nav = document.getElementById('main-navbar');
          if(window.scrollY > 10) {
            nav.classList.add('shadow-lg');
          } else {
            nav.classList.remove('shadow-lg');
          }
        });
        // Profile dropdown toggle
        document.addEventListener('DOMContentLoaded', function() {
          const btn = document.getElementById('profile-dropdown-btn');
          const menu = document.getElementById('profile-dropdown-menu');
          if (btn && menu) {
            btn.addEventListener('click', function(e) {
              e.stopPropagation();
              menu.classList.toggle('hidden');
            });

            // Close when clicking outside
            document.addEventListener('click', function(ev) {
              if (!btn.contains(ev.target) && !menu.contains(ev.target)) {
                if (!menu.classList.contains('hidden')) menu.classList.add('hidden');
              }
            });
          }
        });
      </script>
    </nav>
  </body>
</html>
