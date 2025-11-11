@extends('layoutspublic.app')

@section('content')

<!-- HERO -->
<section class="relative min-h-[40vh]">
    <img src="{{ asset('images/gambar3.jpg') }}" alt="Hero" class="absolute inset-0 w-full h-full object-cover object-center">
    <div class="absolute inset-0 bg-gradient-to-b from-black/60 to-black/50"></div>
    <div class="relative z-10 max-w-7xl mx-auto px-6 py-24 text-center text-white">
        <h1 class="text-3xl md:text-4xl lg:text-5xl font-extrabold">Tentang Kami</h1>
        <p class="mt-4 text-md md:text-lg max-w-3xl mx-auto opacity-90">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Misi kami adalah membuka peluang magang berkualitas untuk generasi muda yang ingin berkontribusi pada bangsa.</p>
    </div>
</section>

<!-- INTRO TWO-COLUMN -->
<section class="py-16">
    <div class="max-w-7xl mx-auto px-6">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
            <div>
                <img src="{{ asset('images/gambar2.jpg') }}" alt="Team" class="rounded-2xl shadow-2xl w-full object-cover">
            </div>
            <div>
                <h2 class="text-2xl md:text-3xl font-bold mb-4">Gabung Sekarang! Belajar, Tumbuh dan Berkontribusi Untuk <span class="text-[#007E5D]">Indonesia</span></h2>
                <p class="text-gray-600 mb-6">Kami menyediakan program magang yang terstruktur, bimbingan dari tenaga profesional, dan pengalaman nyata bekerja di lingkungan pemerintahan. Program dirancang untuk mengembangkan kemampuan teknis dan soft-skill peserta.</p>

                <div class="space-y-4">
                    <div class="flex items-start gap-4">
                        <div class="p-3 bg-[#F0FFF8] rounded-lg text-[#007E5D] w-12 h-12 flex items-center justify-center">
                            <i class="fa-solid fa-graduation-cap"></i>
                        </div>
                        <div>
                            <h4 class="font-semibold">Pembelajaran Terstruktur</h4>
                            <p class="text-sm text-gray-600">Kurikulum magang yang dirancang oleh ahli untuk hasil optimal.</p>
                        </div>
                    </div>

                    <div class="flex items-start gap-4">
                        <div class="p-3 bg-[#FFF8E1] rounded-lg text-[#F59E0B] w-12 h-12 flex items-center justify-center">
                            <i class="fa-solid fa-briefcase"></i>
                        </div>
                        <div>
                            <h4 class="font-semibold">Pengalaman Praktis</h4>
                            <p class="text-sm text-gray-600">Bekerja langsung pada proyek nyata di lingkungan Satuan Kerja.</p>
                        </div>
                    </div>

                    <div class="flex items-start gap-4">
                        <div class="p-3 bg-[#F0F9FF] rounded-lg text-[#0EA5E9] w-12 h-12 flex items-center justify-center">
                            <i class="fa-solid fa-people-roof"></i>
                        </div>
                        <div>
                            <h4 class="font-semibold">Bimbingan Profesional</h4>
                            <p class="text-sm text-gray-600">Mentoring dari pegawai berpengalaman yang siap membimbing perkembangan kariermu.</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>


@include('../Public/Section4')

@endsection
