@extends('layoutspublic.app')
@section('title', 'Satuan Kerja')

@section('content')
<!-- Hero Section -->
<section class="relative bg-gradient-to-br from-emerald-700 via-emerald-600 to-emerald-800 h-[45vh] flex items-center justify-center overflow-hidden">
    <img src="{{ asset('images/gambar3.jpg') }}" alt="Hero Background"
        class="absolute inset-0 w-full h-full object-cover">
  

    <div class="relative z-10 text-center text-white px-4">
        <h1 class="text-4xl md:text-6xl font-extrabold tracking-tight mb-4">Satuan Kerja</h1>
        <p class="text-lg md:text-xl text-white/90 max-w-2xl mx-auto">
            Daftar Unit Kerja DPR RI yang berperan dalam menjaga kelancaran dan profesionalisme lembaga.
        </p>
    </div>
</section>

<!-- Filter Section -->
<div class="container mx-auto px-4 py-16">
    <div class="flex flex-wrap justify-center gap-3 mb-12">
        @php $filters = ['Semua', 'Bagian Umum', 'Bagian Keuangan', 'Bagian SDM']; @endphp
        @foreach($filters as $filter)
        <button class="filter-btn px-6 py-2 rounded-full border border-emerald-600 text-emerald-700 font-medium hover:bg-emerald-600 hover:text-white transition-all duration-300">
            {{ $filter }}
        </button>
        @endforeach
    </div>

    <!-- Work Units Grid -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-10">
        @php
            $units = [
                ['title' => 'Bagian Umum', 'img' => 'umum.jpg', 'desc' => 'Mengelola administrasi umum, pengadaan barang/jasa, dan pemeliharaan fasilitas kantor untuk mendukung operasional yang efisien.', 'personel' => 25, 'lantai' => 2],
                ['title' => 'Bagian Keuangan', 'img' => 'keuangan.jpg', 'desc' => 'Bertanggung jawab atas pengelolaan keuangan, anggaran, dan pelaporan keuangan untuk menjamin transparansi dan akuntabilitas.', 'personel' => 20, 'lantai' => 3],
                ['title' => 'Bagian SDM', 'img' => 'sdm.jpg', 'desc' => 'Mengelola pengembangan sumber daya manusia, pelatihan, dan kesejahteraan pegawai untuk meningkatkan kinerja organisasi.', 'personel' => 15, 'lantai' => 4],
            ];
        @endphp

        @foreach ($units as $unit)
        <div class="group bg-white/80 backdrop-blur-lg rounded-2xl shadow-lg overflow-hidden border border-gray-200 hover:shadow-2xl hover:-translate-y-2 transition-transform duration-300">
            <div class="relative h-52 overflow-hidden">
                <img src="{{ asset('template/assets/img/departments/' . $unit['img']) }}" alt="{{ $unit['title'] }}"
                    class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-black/20 to-transparent"></div>
                <h3 class="absolute bottom-4 left-4 text-white text-2xl font-semibold drop-shadow-lg">{{ $unit['title'] }}</h3>
            </div>
            <div class="p-6 space-y-4">
                <p class="text-gray-600 leading-relaxed">{{ $unit['desc'] }}</p>
                <div class="flex justify-between text-sm text-gray-500 border-t pt-4">
                    <div class="flex items-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                        </svg>
                        <span>{{ $unit['personel'] }} Personel</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5"/>
                        </svg>
                        <span>Lantai {{ $unit['lantai'] }}</span>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

<!-- Stats Section -->
<section class="bg-gradient-to-r from-emerald-50 to-white py-16">
    <div class="container mx-auto px-4 grid grid-cols-2 md:grid-cols-4 gap-10 text-center">
        <div>
            <div class="text-4xl font-bold text-emerald-700 mb-2">60+</div>
            <p class="text-gray-600">Total Personel</p>
        </div>
        <div>
            <div class="text-4xl font-bold text-emerald-700 mb-2">3</div>
            <p class="text-gray-600">Satuan Kerja</p>
        </div>
        <div>
            <div class="text-4xl font-bold text-emerald-700 mb-2">98%</div>
            <p class="text-gray-600">Tingkat Kepuasan</p>
        </div>
        <div>
            <div class="text-4xl font-bold text-emerald-700 mb-2">24/7</div>
            <p class="text-gray-600">Dukungan Layanan</p>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="bg-gradient-to-r from-emerald-700 to-emerald-900 py-20 text-center text-white">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl md:text-4xl font-bold mb-4">Tertarik Bergabung Dengan Tim Kami?</h2>
        <p class="text-white/90 mb-8 max-w-2xl mx-auto">
            Kami selalu mencari talenta terbaik untuk berkontribusi dalam meningkatkan kinerja lembaga.
            Jadilah bagian dari perubahan positif di DPR RI.
        </p>
        <a href="#"
           class="inline-block bg-white text-emerald-700 px-8 py-3 rounded-full font-semibold shadow-md hover:bg-emerald-50 transition-all duration-300">
           Lihat Lowongan
        </a>
    </div>
</section>
@endsection
