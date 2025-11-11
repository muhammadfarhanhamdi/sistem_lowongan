<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Beranda</title>
  @vite(['resources/css/app.css', 'resources/js/app.js'])
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
</head>

<body class="bg-white font-sans">

  <!-- HERO SECTION -->
  <section class="min-h-screen flex flex-col md:flex-row items-center justify-between px-4 md:px-16 lg:px-24 xl:px-36 py-12 md:py-20 gap-12 md:gap-16">
    <!-- Bagian kiri (teks) -->
    <div class="flex-1 space-y-8 md:space-y-10">
      <h1 class="text-5xl md:text-6xl lg:text-6xl font-bold leading-tight text-[#1A1A1A] ">
        Temukan <br>
        Kesempatan Magang <br>
        Di Berbagai <span class="text-[#007E5D] font-bold">Satuan Kerja</span> <br>
        Dewan Perwakilan Rakyat
      </h1>

      <p class="text-gray-600 text-lg md:text-xl leading-relaxed max-w-2xl">
        Bergabung Dengan Kami Hari Ini
        dan Temukan Karier Yang Paling Sesuai Untuk Kamu
      </p>

      <div class="flex items-center gap-6">
        <a href="#" class="inline-flex items-center gap-3 bg-[#FCD12A] text-[#1A1A1A] font-semibold px-8 py-4 rounded-full shadow-lg hover:bg-yellow-400 hover:shadow-xl transition-all duration-300 text-lg">
          Tentang Kami 
          <i class="fa-solid fa-arrow-right"></i>
        </a>
        
        {{-- <a href="#" class="inline-flex items-center gap-3 text-[#007E5D] font-semibold hover:text-[#00664C] transition-colors duration-300 text-lg">
          Lihat Lowongan 
          <i class="fa-solid fa-chevron-right"></i>
        </a> --}}
      </div>

      <!-- Social proof atau statistik -->
      <div class="flex items-center gap-12 pt-8">
        <div>
          <h3 class="text-4xl font-bold text-[#007E5D]">500+</h3>
          <p class="text-gray-600">Peserta Magang</p>
        </div>
        <div>
          <h3 class="text-4xl font-bold text-[#007E5D]">50+</h3>
          <p class="text-gray-600">Satuan Kerja</p>
        </div>
        <div>
          <h3 class="text-4xl font-bold text-[#007E5D]">95%</h3>
          <p class="text-gray-600">Tingkat Kepuasan</p>
        </div>
      </div>
    </div>

    <!-- Bagian kanan (gambar) -->
    <div class="flex-1 flex justify-center md:justify-end">
      <div class="relative">
        <!-- Background decoration -->
        <div class="absolute -top-20 -right-20 w-80 h-80 bg-[#007E5D] rounded-full "></div>
        <div class="absolute -bottom-20 -left-20 w-80 h-80 bg-[#FCD12A] rounded-full "></div>
        
        <img src="{{ asset('images/home.jpg') }}" 
             alt="Tim DPR" 
             class="relative rounded-3xl border-8 border-[#007E5D] w-full max-w-2xl shadow-2xl object-cover">
      </div>
    </div>
  </section>

</body>
</html>
