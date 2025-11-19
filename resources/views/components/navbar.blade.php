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
            
              <a href="{{ route('login') }}" class="bg-white text-black px-6 py-2 rounded-full flex items-center gap-2 font-medium shadow hover:bg-gray-100 transition">
                <i class="fa-solid fa-right-to-bracket mr-2"></i> Login
              </a>
           
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
        <div class="px-6 py-3 space-y-2 text-white text-base">
          <a href="#" class="block hover:text-yellow-300">Beranda</a>
          <a href="#" class="block hover:text-yellow-300">Tentang Kami</a>
          <a href="#" class="block hover:text-yellow-300">Cari Lowongan</a>
          <a href="#" class="block hover:text-yellow-300">Satuan Kerja</a>
          <a href="#" class="block hover:text-yellow-300">Hubungi Kami</a>
          @guest
            <a href="{{ route('login') }}" class="block text-center bg-white text-[#007E5D] font-medium px-4 py-2 rounded-full shadow hover:bg-gray-100 transition">Login</a>
          @else
            <a href="{{ route('admin.dashboard.index') }}" class="block hover:text-yellow-300">Dashboard</a>
            <form method="POST" action="{{ route('logout') }}">
              @csrf
              <button type="submit" class="block w-full text-left hover:text-yellow-300">Logout</button>
            </form>
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
      </script>
    </nav>
  </body>
</html>
