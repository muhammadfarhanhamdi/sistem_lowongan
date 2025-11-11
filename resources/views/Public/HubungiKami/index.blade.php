@extends('layoutspublic.app')

@section('content')

<!-- ================== HERO SECTION ================== -->
<section class="relative">
  <img 
    src="{{ asset('images/gambar3.jpg') }}" 
    alt="hero" 
    class="w-full h-64 md:h-80 object-cover object-center"
  >
  <div class="absolute inset-0 bg-gradient-to-b from-black/60 to-black/40"></div>

  <div class="absolute inset-0 flex flex-col justify-center items-center text-center px-6">
    <h1 class="text-3xl md:text-4xl font-extrabold text-white mb-3 drop-shadow">
      Hubungi Kami
    </h1>
    <p class="text-sm md:text-base text-white/90 max-w-2xl mx-auto leading-relaxed">
      Punya pertanyaan, saran, atau butuh bantuan? Tim kami siap membantu. 
      Hubungi kami lewat formulir di bawah atau gunakan informasi kontak yang tersedia.
    </p>
  </div>
</section>

<!-- ================== CONTACT SECTION ================== -->
<section class="py-16 bg-white">
  <div class="max-w-7xl mx-auto px-6 grid grid-cols-1 lg:grid-cols-3 gap-10">

    <!-- ================== LEFT: FORM ================== -->
    <div class="lg:col-span-2 bg-green-100 rounded-2xl shadow-lg p-8">
      @if(session('success'))
        <div class="mb-4 p-4 bg-green-50 border border-green-200 text-green-800 rounded-lg">
          {{ session('success') }}
        </div>
      @endif

      <h2 class="text-2xl font-bold mb-2 text-gray-900">Kirim Pesan</h2>
      <p class="text-gray-600 mb-6">Isi formulir berikut dan kami akan menghubungi Anda sesegera mungkin.</p>

      <form action="#" method="POST" class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <!-- Nama -->
        <div>
          <label class="block text-sm font-medium text-gray-700 mb-2">Nama</label>
          <input 
            type="text" 
            name="name" 
            class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-[#007E5D] focus:outline-none" 
            placeholder="Nama lengkap"
          >
        </div>

        <!-- Email -->
        <div>
          <label class="block text-sm font-medium text-gray-700 mb-2">Email</label>
          <input 
            type="email" 
            name="email" 
            class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-[#007E5D] focus:outline-none" 
            placeholder="email@contoh.com"
          >
        </div>

        <!-- Subjek -->
        <div class="md:col-span-2">
          <label class="block text-sm font-medium text-gray-700 mb-2">Subjek</label>
          <input 
            type="text" 
            name="subject" 
            class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-[#007E5D] focus:outline-none" 
            placeholder="Judul pesan"
          >
        </div>

        <!-- Pesan -->
        <div class="md:col-span-2">
          <label class="block text-sm font-medium text-gray-700 mb-2">Pesan</label>
          <textarea 
            name="message" 
            rows="6" 
            class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-[#007E5D] focus:outline-none" 
            placeholder="Tulis pesan Anda..."
          ></textarea>
        </div>

        <!-- Tombol -->
        <div class="md:col-span-2 flex flex-col md:flex-row items-center justify-between mt-4 gap-3">
          <p class="text-sm text-gray-600 text-center md:text-left">
            Atau hubungi kami langsung lewat kontak di sebelah kanan.
          </p>
          <button 
            type="submit" 
            class="bg-[#007E5D] text-white px-6 py-2 rounded-lg font-semibold shadow hover:bg-[#00986F] hover:scale-[1.03] transition duration-200"
          >
            Kirim Pesan
          </button>
        </div>
      </form>
    </div>

    <!-- ================== RIGHT: CONTACT INFO ================== -->
    <aside class="space-y-6">
      <!-- Alamat -->
      <div class="bg-[#F0FFF8] border-l-4 border-[#007E5D] p-6 rounded-lg">
        <h3 class="font-bold text-[#007E5D] text-lg">Alamat Kantor</h3>
        <p class="text-sm text-gray-700 mt-2 leading-relaxed">
          Jl. Jendral Gatot Subroto Kav. 51, Jakarta 12750, Indonesia
        </p>
      </div>

      <!-- Kontak -->
      <div class="bg-white rounded-lg shadow p-6">
        <h4 class="font-semibold text-gray-900 mb-3">Kontak</h4>
        <div class="space-y-2 text-gray-700">
          <div class="flex items-center gap-3">
            <i class="fa-solid fa-phone text-[#007E5D]"></i>
            <a href="tel:0218976682" class="text-sm hover:text-[#007E5D] transition">021-897-6682</a>
          </div>
          <div class="flex items-center gap-3">
            <i class="fa-solid fa-envelope text-[#007E5D]"></i>
            <a href="mailto:loremipsum@gmail.cc.id" class="text-sm hover:text-[#007E5D] transition">
              loremipsum@gmail.cc.id
            </a>
          </div>
        </div>

        <div class="mt-5">
          <h5 class="font-semibold text-gray-900 mb-1">Jam Operasional</h5>
          <p class="text-sm text-gray-600">Senin - Jumat: 08:00 - 16:00 WIB</p>
        </div>
      </div>

      <!-- Peta -->
      <div class="bg-white rounded-lg shadow overflow-hidden">
        <iframe 
          class="w-full h-48" 
          frameborder="0" 
          scrolling="no" 
          marginheight="0" 
          marginwidth="0" 
          src="https://www.google.com/maps?q=Jakarta+Indonesia&output=embed"
        ></iframe>
      </div>

      <!-- Sosial Media -->
      <div class="bg-white rounded-lg shadow p-5 text-center">
        <h5 class="font-semibold text-gray-900 mb-3">Ikuti Kami</h5>
        <div class="flex items-center justify-center gap-3">
          <a href="#" class="w-10 h-10 rounded-full bg-[#007E5D] text-white flex items-center justify-center hover:bg-[#00986F] transition">
            <i class="fa-brands fa-facebook-f"></i>
          </a>
          <a href="#" class="w-10 h-10 rounded-full bg-[#007E5D] text-white flex items-center justify-center hover:bg-[#00986F] transition">
            <i class="fa-brands fa-instagram"></i>
          </a>
          <a href="#" class="w-10 h-10 rounded-full bg-[#007E5D] text-white flex items-center justify-center hover:bg-[#00986F] transition">
            <i class="fa-brands fa-twitter"></i>
          </a>
        </div>
      </div>
    </aside>

  </div>
</section>

@endsection
