<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Lowongan Magang</title>
  @vite(['resources/css/app.css', 'resources/js/app.js'])
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
</head>

<body class="bg-white font-sans">

  <!-- SEARCH SECTION -->
  <section class="bg-white py-16 px-6 md:px-20 lg:px-28">
    <div class="max-w-7xl mx-auto">

      <!-- Heading & Subheading -->
      <div class="text-center mb-14">
        <h2 class="text-3xl md:text-4xl font-bold mb-4 text-[#1A1A1A]">
          Temukan Karier yang paling Sesuai untuk Kamu
        </h2>
        <p class="text-gray-600 max-w-3xl mx-auto leading-relaxed">
          Kami menawarkan berbagai peluang yang sesuai dengan keterampilan dan ambisi Kamu. 
          Daftar hari ini dan ambil langkah berikutnya menuju karier impian. 
          Masa depan Kamu dimulai di sini.
        </p>
    </div>
    <div class="flex justify-end mb-2">
    <p class="text-[#007E5D] font-medium mt-5">12 Lowongan | 1.200 Pelamar Aktif</p>
    </div>

      <!-- Search Form -->
      <div class="bg-[#007E5D] rounded-xl p-6 mb-16 w-full shadow-md">
        <form class="grid grid-cols-1 md:grid-cols-5 gap-4">
          <div class="relative md:col-span-1">
            <select class="w-full bg-white rounded-lg px-4 py-3 appearance-none cursor-pointer text-gray-700">
              <option value="">Posisi</option>
            </select>
            <div class="absolute right-3 top-1/2 transform -translate-y-1/2 pointer-events-none">
              <i class="fa-solid fa-chevron-down text-gray-400"></i>
            </div>
          </div>

          <div class="relative md:col-span-1">
            <select class="w-full bg-white rounded-lg px-4 py-3 appearance-none cursor-pointer text-gray-700">
              <option value="">Satuan Kerja</option>
            </select>
            <div class="absolute right-3 top-1/2 transform -translate-y-1/2 pointer-events-none">
              <i class="fa-solid fa-chevron-down text-gray-400"></i>
            </div>
          </div>

          <div class="relative md:col-span-1">
            <select class="w-full bg-white rounded-lg px-4 py-3 appearance-none cursor-pointer text-gray-700">
              <option value="">Jurusan</option>
            </select>
            <div class="absolute right-3 top-1/2 transform -translate-y-1/2 pointer-events-none">
              <i class="fa-solid fa-chevron-down text-gray-400"></i>
            </div>
          </div>

          <div class="relative md:col-span-1">
            <select class="w-full bg-white rounded-lg px-4 py-3 appearance-none cursor-pointer text-gray-700">
              <option value="">Jenjang Pendidikan</option>
            </select>
            <div class="absolute right-3 top-1/2 transform -translate-y-1/2 pointer-events-none">
              <i class="fa-solid fa-chevron-down text-gray-400"></i>
            </div>
          </div>

          <button type="submit" class="bg-[#FCD12A] text-black font-semibold px-6 py-3 rounded-lg hover:bg-yellow-400 transition duration-300 flex items-center justify-center gap-2">
            <span>Cari Lowongan</span>
            <i class="fa-solid fa-magnifying-glass"></i>
          </button>
        </form>
      </div>

      <!-- Job Cards Grid -->
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        <!-- Job Card -->
        <div class="border-2 border-[#007E5D] rounded-2xl p-8 hover:shadow-lg transition duration-300 flex flex-col justify-between">
          <div>
            <img src="{{ asset('images/logo_pustek.png') }}" alt="Pustekinfo" class="h-32 ">
            <h3 class="text-xl font-semibold mb-1 text-[#1A1A1A]">Pusat Teknologi Informasi</h3>
            <p class="text-gray-600 text-sm mb-2">WEB DEVELOPER</p>
            <p class="text-[#007E5D] font-medium mb-4 text-sm">2 Kuota | 10 Pelamar</p>

            <div class="flex gap-3 mb-6">
              <span class="border border-[#007E5D] text-[#007E5D] px-4 py-1 rounded-full text-sm">3 Bulan</span>
              <span class="border border-[#007E5D] text-[#007E5D] px-4 py-1 rounded-full text-sm">Onsite</span>
            </div>

            <hr class="my-4">

            <p class="text-sm text-gray-700 mb-2">Penutupan: <span class="text-red-500 font-medium">10 November 2025</span></p>
            <div class="flex items-center gap-2 text-gray-500 text-sm bg-gray-100 px-3 py-2 rounded-lg">
              <i class="fa-regular fa-calendar"></i>
              <span>Dibuat 1 bulan yang lalu</span>
            </div>
          </div>

          <a href="#" class="mt-6 block text-center bg-[#FCD12A] text-[#1A1A1A] font-semibold py-3 rounded-lg hover:bg-yellow-400 transition duration-300">
            Lihat Detail
          </a>
        </div>

      <div class="border-2 border-[#007E5D] rounded-2xl p-8 hover:shadow-lg transition duration-300 flex flex-col justify-between">
          <div>
            <img src="{{ asset('images/logo_pustek.png') }}" alt="Pustekinfo" class="h-32 ">
            <h3 class="text-xl font-semibold mb-1 text-[#1A1A1A]">Pusat Teknologi Informasi</h3>
            <p class="text-gray-600 text-sm mb-2">WEB DEVELOPER</p>
            <p class="text-[#007E5D] font-medium mb-4 text-sm">2 Kuota | 10 Pelamar</p>

            <div class="flex gap-3 mb-6">
              <span class="border border-[#007E5D] text-[#007E5D] px-4 py-1 rounded-full text-sm">3 Bulan</span>
              <span class="border border-[#007E5D] text-[#007E5D] px-4 py-1 rounded-full text-sm">Onsite</span>
            </div>

            <hr class="my-4">

            <p class="text-sm text-gray-700 mb-2">Penutupan: <span class="text-red-500 font-medium">10 November 2025</span></p>
            <div class="flex items-center gap-2 text-gray-500 text-sm bg-gray-100 px-3 py-2 rounded-lg">
              <i class="fa-regular fa-calendar"></i>
              <span>Dibuat 1 bulan yang lalu</span>
            </div>
          </div>

          <a href="#" class="mt-6 block text-center bg-[#FCD12A] text-[#1A1A1A] font-semibold py-3 rounded-lg hover:bg-yellow-400 transition duration-300">
            Lihat Detail
          </a>
        </div> <div class="border-2 border-[#007E5D] rounded-2xl p-8 hover:shadow-lg transition duration-300 flex flex-col justify-between">
          <div>
            <img src="{{ asset('images/logo_pustek.png') }}" alt="Pustekinfo" class="h-32 ">
            <h3 class="text-xl font-semibold mb-1 text-[#1A1A1A]">Pusat Teknologi Informasi</h3>
            <p class="text-gray-600 text-sm mb-2">WEB DEVELOPER</p>
            <p class="text-[#007E5D] font-medium mb-4 text-sm">2 Kuota | 10 Pelamar</p>

            <div class="flex gap-3 mb-6">
              <span class="border border-[#007E5D] text-[#007E5D] px-4 py-1 rounded-full text-sm">3 Bulan</span>
              <span class="border border-[#007E5D] text-[#007E5D] px-4 py-1 rounded-full text-sm">Onsite</span>
            </div>

            <hr class="my-4">

            <p class="text-sm text-gray-700 mb-2">Penutupan: <span class="text-red-500 font-medium">10 November 2025</span></p>
            <div class="flex items-center gap-2 text-gray-500 text-sm bg-gray-100 px-3 py-2 rounded-lg">
              <i class="fa-regular fa-calendar"></i>
              <span>Dibuat 1 bulan yang lalu</span>
            </div>
          </div>

          <a href="#" class="mt-6 block text-center bg-[#FCD12A] text-[#1A1A1A] font-semibold py-3 rounded-lg hover:bg-yellow-400 transition duration-300">
            Lihat Detail
          </a>
        </div> <div class="border-2 border-[#007E5D] rounded-2xl p-8 hover:shadow-lg transition duration-300 flex flex-col justify-between">
          <div>
            <img src="{{ asset('images/logo_pustek.png') }}" alt="Pustekinfo" class="h-32 ">
            <h3 class="text-xl font-semibold mb-1 text-[#1A1A1A]">Pusat Teknologi Informasi</h3>
            <p class="text-gray-600 text-sm mb-2">WEB DEVELOPER</p>
            <p class="text-[#007E5D] font-medium mb-4 text-sm">2 Kuota | 10 Pelamar</p>

            <div class="flex gap-3 mb-6">
              <span class="border border-[#007E5D] text-[#007E5D] px-4 py-1 rounded-full text-sm">3 Bulan</span>
              <span class="border border-[#007E5D] text-[#007E5D] px-4 py-1 rounded-full text-sm">Onsite</span>
            </div>

            <hr class="my-4">

            <p class="text-sm text-gray-700 mb-2">Penutupan: <span class="text-red-500 font-medium">10 November 2025</span></p>
            <div class="flex items-center gap-2 text-gray-500 text-sm bg-gray-100 px-3 py-2 rounded-lg">
              <i class="fa-regular fa-calendar"></i>
              <span>Dibuat 1 bulan yang lalu</span>
            </div>
          </div>

          <a href="#" class="mt-6 block text-center bg-[#FCD12A] text-[#1A1A1A] font-semibold py-3 rounded-lg hover:bg-yellow-400 transition duration-300">
            Lihat Detail
          </a>
        </div> <div class="border-2 border-[#007E5D] rounded-2xl p-8 hover:shadow-lg transition duration-300 flex flex-col justify-between">
          <div>
            <img src="{{ asset('images/logo_pustek.png') }}" alt="Pustekinfo" class="h-32 ">
            <h3 class="text-xl font-semibold mb-1 text-[#1A1A1A]">Pusat Teknologi Informasi</h3>
            <p class="text-gray-600 text-sm mb-2">WEB DEVELOPER</p>
            <p class="text-[#007E5D] font-medium mb-4 text-sm">2 Kuota | 10 Pelamar</p>

            <div class="flex gap-3 mb-6">
              <span class="border border-[#007E5D] text-[#007E5D] px-4 py-1 rounded-full text-sm">3 Bulan</span>
              <span class="border border-[#007E5D] text-[#007E5D] px-4 py-1 rounded-full text-sm">Onsite</span>
            </div>

            <hr class="my-4">

            <p class="text-sm text-gray-700 mb-2">Penutupan: <span class="text-red-500 font-medium">10 November 2025</span></p>
            <div class="flex items-center gap-2 text-gray-500 text-sm bg-gray-100 px-3 py-2 rounded-lg">
              <i class="fa-regular fa-calendar"></i>
              <span>Dibuat 1 bulan yang lalu</span>
            </div>
          </div>

          <a href="#" class="mt-6 block text-center bg-[#FCD12A] text-[#1A1A1A] font-semibold py-3 rounded-lg hover:bg-yellow-400 transition duration-300">
            Lihat Detail
          </a>
        </div> <div class="border-2 border-[#007E5D] rounded-2xl p-8 hover:shadow-lg transition duration-300 flex flex-col justify-between">
          <div>
            <img src="{{ asset('images/logo_pustek.png') }}" alt="Pustekinfo" class="h-32 ">
            <h3 class="text-xl font-semibold mb-1 text-[#1A1A1A]">Pusat Teknologi Informasi</h3>
            <p class="text-gray-600 text-sm mb-2">WEB DEVELOPER</p>
            <p class="text-[#007E5D] font-medium mb-4 text-sm">2 Kuota | 10 Pelamar</p>

            <div class="flex gap-3 mb-6">
              <span class="border border-[#007E5D] text-[#007E5D] px-4 py-1 rounded-full text-sm">3 Bulan</span>
              <span class="border border-[#007E5D] text-[#007E5D] px-4 py-1 rounded-full text-sm">Onsite</span>
            </div>

            <hr class="my-4">

            <p class="text-sm text-gray-700 mb-2">Penutupan: <span class="text-red-500 font-medium">10 November 2025</span></p>
            <div class="flex items-center gap-2 text-gray-500 text-sm bg-gray-100 px-3 py-2 rounded-lg">
              <i class="fa-regular fa-calendar"></i>
              <span>Dibuat 1 bulan yang lalu</span>
            </div>
          </div>

          <a href="#" class="mt-6 block text-center bg-[#FCD12A] text-[#1A1A1A] font-semibold py-3 rounded-lg hover:bg-yellow-400 transition duration-300">
            Lihat Detail
          </a>
        </div>
      </div>

      <!-- Pagination -->
      <div class="flex justify-center items-center gap-3 mt-14">
        <button class="w-10 h-10 rounded-full bg-[#007E5D] text-white flex items-center justify-center">
          <i class="fa-solid fa-chevron-left"></i>
        </button>
        <button class="w-10 h-10 rounded-full bg-[#007E5D] text-white flex items-center justify-center">1</button>
        <button class="w-10 h-10 rounded-full bg-gray-100 text-gray-600 flex items-center justify-center">2</button>
        <button class="w-10 h-10 rounded-full bg-gray-100 text-gray-600 flex items-center justify-center">3</button>
        <button class="w-10 h-10 rounded-full bg-gray-100 text-gray-600 flex items-center justify-center">
          <i class="fa-solid fa-chevron-right"></i>
        </button>
      </div>

    </div>
  </section>

</body>
</html>
