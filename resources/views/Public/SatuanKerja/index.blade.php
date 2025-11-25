@extends('layoutspublic.app')
@section('title', 'Satuan Kerja')

@section('content')
<style>
    :root{
        --primary: #0f766e; /* teal */
        --accent: #eab308;  /* amber */
        --muted: #f8fafc;   /* slate-50 */
        --card-border: #e6eef0;
        --bg-hero: rgba(11, 78, 70, 0.85);
    }
    .btn-filter{background:transparent;border:1px solid var(--primary);color:var(--primary)}
    .btn-filter.active{background:var(--primary);color:white}
    .card-uk{border:1px solid var(--card-border);background:linear-gradient(180deg, rgba(255,255,255,0.85), rgba(255,255,255,0.95))}
    .badge-accent{background:var(--accent);color:#07221a;padding:.25rem .6rem;border-radius:9999px;font-weight:600}
    .icon-muted{color:var(--primary)}
</style>

<!-- Hero Section -->
<section class="relative h-[44vh] flex items-center justify-center overflow-hidden rounded-b-2xl" style="background: linear-gradient(180deg, rgba(15,118,110,0.95), rgba(6,78,67,0.9));">
    <div class="absolute inset-0 opacity-20">
        <img src="{{ asset('images/gambar3.jpg') }}" alt="Hero Background" class="w-full h-full object-cover">
    </div>
    <div class="relative z-10 text-center text-white px-6">
        <h1 class="text-4xl md:text-5xl font-extrabold tracking-tight mb-2">Satuan Kerja</h1>
        <p class="text-md md:text-lg text-white/90 max-w-3xl mx-auto">Daftar Unit Kerja DPR RI — ringkasan tugas, personel, dan lokasi.</p>
    </div>
</section>

<!-- Filter Section -->
<div class="container mx-auto px-4 py-12">
    <div class="flex flex-wrap justify-center gap-3 mb-10">
        @php $filters = ['Semua', 'Bagian Umum', 'Bagian Keuangan', 'Bagian SDM']; @endphp
        @foreach($filters as $filter)
        <button type="button" class="btn-filter px-5 py-2 rounded-full text-sm font-medium hover:opacity-95 transition" aria-pressed="false">
            {{ $filter }}
        </button>
        @endforeach
    </div>

    <!-- Work Units Grid -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
        @php
            $units = [
                ['title' => 'Bagian Umum', 'img' => 'umum.jpg', 'desc' => 'Mengelola administrasi umum, pengadaan barang/jasa, dan pemeliharaan fasilitas kantor untuk mendukung operasional yang efisien.', 'personel' => 25, 'lantai' => 2],
                ['title' => 'Bagian Keuangan', 'img' => 'keuangan.jpg', 'desc' => 'Bertanggung jawab atas pengelolaan keuangan, anggaran, dan pelaporan keuangan untuk menjamin transparansi dan akuntabilitas.', 'personel' => 20, 'lantai' => 3],
                ['title' => 'Bagian SDM', 'img' => 'sdm.jpg', 'desc' => 'Mengelola pengembangan sumber daya manusia, pelatihan, dan kesejahteraan pegawai untuk meningkatkan kinerja organisasi.', 'personel' => 15, 'lantai' => 4],
            ];
        @endphp

        @foreach ($units as $unit)
        <article class="group card-uk rounded-2xl shadow-md overflow-hidden transform hover:-translate-y-2 hover:shadow-xl transition duration-300">
            <div class="relative h-44 md:h-48">
                <img src="{{ asset('template/assets/img/departments/' . $unit['img']) }}" alt="{{ $unit['title'] }}" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
                <div class="absolute inset-0 bg-gradient-to-t from-black/40 to-transparent"></div>
                <div class="absolute left-4 bottom-4">
                    <h3 class="text-white text-xl font-semibold drop-shadow">{{ $unit['title'] }}</h3>
                    <div class="mt-2 flex items-center gap-2">
                        <span class="badge-accent text-sm">{{ $unit['personel'] }} Personel</span>
                        <span class="text-xs text-white/90 px-2 py-1 rounded-full bg-black/30">Lantai {{ $unit['lantai'] }}</span>
                    </div>
                </div>
                <button aria-label="Lihat lebih" class="absolute right-4 top-4 bg-white/90 text-sm text-emerald-700 px-3 py-2 rounded-lg shadow-sm hover:scale-105 transition">
                    <i class="fa-solid fa-info"></i>
                </button>
            </div>

            <div class="px-6 py-5">
                <p class="text-gray-700 text-sm leading-relaxed mb-4">{{ \Illuminate\Support\Str::limit($unit['desc'], 150) }}</p>
                <div class="flex items-center justify-between">
                    <div class="flex items-center gap-4 text-sm text-gray-600">
                        <div class="flex items-center gap-2">
                            <svg class="w-5 h-5 icon-muted" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                            <span>{{ $unit['personel'] }} Personel</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <svg class="w-5 h-5 icon-muted" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16"/></svg>
                            <span>Lantai {{ $unit['lantai'] }}</span>
                        </div>
                    </div>

                    <a href="#" class="inline-flex items-center gap-2 text-sm font-medium text-white btn-primary px-4 py-2 rounded-lg">
                        <i class="fa-solid fa-arrow-right-long"></i>
                        Detail
                    </a>
                </div>
            </div>
        </article>
        @endforeach
    </div>
</div>

<!-- Stats Section -->
<section class="py-16 bg-white">
    <div class="container mx-auto px-4 grid grid-cols-2 md:grid-cols-4 gap-8 text-center">
        <div class="p-6 bg-white rounded-xl shadow-sm">
            <div class="text-3xl font-bold text-primary mb-2">60+</div>
            <p class="text-gray-600">Total Personel</p>
        </div>
        <div class="p-6 bg-white rounded-xl shadow-sm">
            <div class="text-3xl font-bold text-primary mb-2">3</div>
            <p class="text-gray-600">Satuan Kerja</p>
        </div>
        <div class="p-6 bg-white rounded-xl shadow-sm">
            <div class="text-3xl font-bold text-primary mb-2">98%</div>
            <p class="text-gray-600">Tingkat Kepuasan</p>
        </div>
        <div class="p-6 bg-white rounded-xl shadow-sm">
            <div class="text-3xl font-bold text-primary mb-2">24/7</div>
            <p class="text-gray-600">Dukungan Layanan</p>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-20 text-center" style="background:linear-gradient(90deg,var(--primary), #064e46); color:#fff;">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl md:text-4xl font-bold mb-4">Tertarik Bergabung Dengan Tim Kami?</h2>
        <p class="text-white/90 mb-8 max-w-2xl mx-auto">Kami selalu mencari talenta terbaik untuk berkontribusi dalam meningkatkan kinerja lembaga. Jadilah bagian dari perubahan positif di DPR RI.</p>
        <a href="#" class="inline-block btn-accent px-8 py-3 rounded-full font-semibold shadow-md">Lihat Lowongan</a>
    </div>
</section>
@endsection
