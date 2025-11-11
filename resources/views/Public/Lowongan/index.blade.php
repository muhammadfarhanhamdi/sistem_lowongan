@extends('layoutspublic.app')

@section('content')

<!-- ================== HERO SECTION ================== -->
<section class="relative mb-32">
  <!-- Background image -->
  <img 
    src="{{ asset('images/gambar3.jpg') }}" 
    alt="hero" 
    class="w-full h-[420px] md:h-[500px] object-cover object-center"
  >

  <!-- Overlay -->
  <div class="absolute inset-0 bg-black/60"></div>

  <!-- Text content -->
  <div class="absolute inset-0 flex flex-col justify-center items-center text-center px-6 md:px-10">
    <h2 class="text-white text-2xl md:text-4xl font-bold mb-3 drop-shadow leading-snug">
      Temukan Karier yang Paling Sesuai Untuk Kamu
    </h2>
    <p class="text-white/90 text-sm md:text-base max-w-2xl mx-auto leading-relaxed">
      Kami menampilkan lowongan magang dari berbagai Satuan Kerja. Pilih sesuai minat dan kualifikasimu.
    </p>
  </div>

  <!-- ================== SEARCH BAR FLOATING ================== -->
  <div class="absolute left-1/2 bottom-0 transform -translate-x-1/2 translate-y-1/2 w-[90%] md:w-[80%] lg:w-[70%]">
    <div class="bg-[#007E5D] rounded-2xl shadow-2xl p-6 md:p-8">
      <form class="grid grid-cols-1 md:grid-cols-5 gap-4">
        <!-- Posisi -->
        <div class="relative">
          <select class="w-full bg-white rounded-lg px-4 py-3 appearance-none cursor-pointer text-gray-700">
            <option value="">Posisi</option>
          </select>
          <i class="fa-solid fa-chevron-down absolute right-3 top-1/2 -translate-y-1/2 text-gray-400"></i>
        </div>

        <!-- Satuan Kerja -->
        <div class="relative">
          <select class="w-full bg-white rounded-lg px-4 py-3 appearance-none cursor-pointer text-gray-700">
            <option value="">Satuan Kerja</option>
          </select>
          <i class="fa-solid fa-chevron-down absolute right-3 top-1/2 -translate-y-1/2 text-gray-400"></i>
        </div>

        <!-- Jurusan -->
        <div class="relative">
          <select class="w-full bg-white rounded-lg px-4 py-3 appearance-none cursor-pointer text-gray-700">
            <option value="">Jurusan</option>
          </select>
          <i class="fa-solid fa-chevron-down absolute right-3 top-1/2 -translate-y-1/2 text-gray-400"></i>
        </div>

        <!-- Jenjang Pendidikan -->
        <div class="relative">
          <select class="w-full bg-white rounded-lg px-4 py-3 appearance-none cursor-pointer text-gray-700">
            <option value="">Jenjang Pendidikan</option>
          </select>
          <i class="fa-solid fa-chevron-down absolute right-3 top-1/2 -translate-y-1/2 text-gray-400"></i>
        </div>

        <!-- Tombol Cari -->
        <button 
          type="submit" 
          class="bg-[#FCD12A] text-black font-semibold px-6 py-3 rounded-lg hover:bg-yellow-400 transition duration-300 flex items-center justify-center gap-2"
        >
          <span>Cari Lowongan</span>
          <i class="fa-solid fa-magnifying-glass"></i>
        </button>
      </form>
    </div>
  </div>
</section>

<!-- ================== JOB LIST ================== -->
<section class="max-w-6xl mx-auto mt-10 px-6">
  <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

    @for ($i = 0; $i < 6; $i++)
    <!-- Job Card -->
    <div class="border border-[#007E5D]/40 rounded-2xl p-8 hover:shadow-lg hover:-translate-y-1 transition duration-300 bg-white flex flex-col justify-between">
      <div>
        <div class="flex  mb-5">
          <img src="{{ asset('images/logo_pustek.png') }}" alt="Pustekinfo" class="h-24 object-contain">
        </div>
        
        <h3 class="text-lg font-semibold mb-1 text-[#1A1A1A]">Pusat Teknologi Informasi</h3>
        <p class="text-gray-600 text-sm mb-1">WEB DEVELOPER</p>
        <p class="text-[#007E5D] font-medium mb-4 text-sm">2 Kuota | 10 Pelamar</p>

        <div class="flex flex-wrap gap-3 mb-6">
          <span class="border border-[#007E5D] text-[#007E5D] px-4 py-1 rounded-full text-sm">3 Bulan</span>
          <span class="border border-[#007E5D] text-[#007E5D] px-4 py-1 rounded-full text-sm">Onsite</span>
        </div>

        <hr class="my-4 border-gray-200">

        <p class="text-sm text-gray-700 mb-3">
          Penutupan: <span class="text-red-500 font-medium">10 November 2025</span>
        </p>
        <div class="flex items-center gap-2 text-gray-500 text-sm bg-gray-100 px-3 py-2 rounded-lg">
          <i class="fa-regular fa-calendar"></i>
          <span>Dibuat 1 bulan yang lalu</span>
        </div>
      </div>

      <a href="#" class="mt-6 block text-center bg-[#FCD12A] text-[#1A1A1A] font-semibold py-3 rounded-lg hover:bg-yellow-400 transition duration-300">
        Lihat Detail
      </a>
    </div>
    @endfor

  </div>
</section>

<!-- ================== PAGINATION ================== -->
<div class="flex justify-center items-center gap-3 mt-16 mb-20">
  <button class="w-10 h-10 rounded-full bg-[#007E5D] text-white flex items-center justify-center">
    <i class="fa-solid fa-chevron-left"></i>
  </button>
  <button class="w-10 h-10 rounded-full bg-[#007E5D] text-white font-medium">1</button>
  <button class="w-10 h-10 rounded-full bg-gray-100 text-gray-600 font-medium">2</button>
  <button class="w-10 h-10 rounded-full bg-gray-100 text-gray-600 font-medium">3</button>
  <button class="w-10 h-10 rounded-full bg-gray-100 text-gray-600 flex items-center justify-center">
    <i class="fa-solid fa-chevron-right"></i>
  </button>
</div>


@include('../Public/Section4')

@endsection
