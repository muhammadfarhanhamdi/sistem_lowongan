@extends('layoutspublic.app')

@section('content')
    <section class="relative mb-32">
        <img src="{{ asset('images/gambar3.jpg') }}" alt="hero"
            class="w-full h-[420px] md:h-[500px] object-cover object-center">

        <div class="absolute inset-0 bg-black/60"></div>

        <div class="absolute inset-0 flex flex-col justify-center items-center text-center px-6 md:px-10">
            <h2 class="text-white text-2xl md:text-4xl font-bold mb-3 drop-shadow leading-snug">
                Temukan Karier yang Paling Sesuai Untuk Kamu
            </h2>
            <p class="text-white/90 text-sm md:text-base max-w-2xl mx-auto leading-relaxed">
                Kami menampilkan lowongan magang dari berbagai Satuan Kerja. Pilih sesuai minat dan kualifikasimu.
            </p>
        </div>

        <div class="absolute left-1/2 bottom-0 transform -translate-x-1/2 translate-y-1/2 w-[90%] md:w-[80%] lg:w-[70%]">
            <div class="bg-[#007E5D] rounded-2xl shadow-2xl p-6 md:p-8">
                <form class="grid grid-cols-1 md:grid-cols-5 gap-4" method="GET"
                    action="{{ route('public.lowongan.index') }}">
                    <div class="relative">
                        <select name="posisi"
                            class="w-full bg-white rounded-lg px-4 py-3 appearance-none cursor-pointer text-gray-700">
                            <option value="">Posisi</option>
                            @foreach ($kategoris as $kategori)
                                <option value="{{ $kategori->id }}"
                                    {{ request('posisi') == $kategori->id ? 'selected' : '' }}>
                                    {{ $kategori->nama_kategori }}
                                </option>
                            @endforeach
                        </select>
                        <i class="fa-solid fa-chevron-down absolute right-3 top-1/2 -translate-y-1/2 text-gray-400"></i>
                    </div>

                    <div class="relative">
                        <select name="satuan_kerja"
                            class="w-full bg-white rounded-lg px-4 py-3 appearance-none cursor-pointer text-gray-700">
                            <option value="">Satuan Kerja</option>
                            @foreach ($satuanKerjas as $satuanKerja)
                                <option value="{{ $satuanKerja->id }}"
                                    {{ request('satuan_kerja') == $satuanKerja->id ? 'selected' : '' }}>
                                    {{ $satuanKerja->nama_satuan }}
                                </option>
                            @endforeach
                        </select>
                        <i class="fa-solid fa-chevron-down absolute right-3 top-1/2 -translate-y-1/2 text-gray-400"></i>
                    </div>

                    <div class="relative">
                        <select name="jurusan"
                            class="w-full bg-white rounded-lg px-4 py-3 appearance-none cursor-pointer text-gray-700">
                            <option value="">Jurusan</option>
                            @foreach ($jurusans as $jurusan)
                                <option value="{{ $jurusan->id }}"
                                    {{ request('jurusan') == $jurusan->id ? 'selected' : '' }}>
                                    {{ $jurusan->nama_jurusan }}
                                </option>
                            @endforeach
                        </select>
                        <i class="fa-solid fa-chevron-down absolute right-3 top-1/2 -translate-y-1/2 text-gray-400"></i>
                    </div>

                    <div class="relative">
                        <select name="jenjang"
                            class="w-full bg-white rounded-lg px-4 py-3 appearance-none cursor-pointer text-gray-700">
                            <option value="">Jenjang Pendidikan</option>
                            @foreach ($jenjangs as $jenjang)
                                <option value="{{ $jenjang->id }}"
                                    {{ request('jenjang') == $jenjang->id ? 'selected' : '' }}>
                                    {{ $jenjang->nama_jenjang }}
                                </option>
                            @endforeach
                        </select>
                        <i class="fa-solid fa-chevron-down absolute right-3 top-1/2 -translate-y-1/2 text-gray-400"></i>
                    </div>

                    <button type="submit"
                        class="bg-[#FCD12A] text-black font-semibold px-6 py-3 rounded-lg hover:bg-yellow-400 transition duration-300 flex items-center justify-center gap-2">
                        <span>Cari Lowongan</span>
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </button>
                </form>
            </div>
        </div>
    </section>

    <section id="lowongan-grid" class="max-w-6xl mx-auto mt-10 px-6">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

            @forelse ($lowongans as $lowongan)
                <div
                    class="border border-[#007E5D]/40 rounded-2xl p-8 hover:shadow-lg hover:-translate-y-1 transition duration-300 bg-white flex flex-col justify-between">
                    <div>
                        <div class="flex  mb-5">
                            <img src="{{ asset('images/logo_pustek.png') }}"
                                alt="{{ $lowongan->satuanKerja->nama_satuan ?? 'N/A' }}" class="h-24 object-contain">
                        </div>

                        <h3 class="text-lg font-semibold mb-1 text-[#1A1A1A]">
                            {{ $lowongan->satuanKerja->nama_satuan ?? 'Satker Tidak Ditemukan' }}</h3>
                        <p class="text-gray-600 text-sm mb-1">
                            {{ $lowongan->kategori->nama_kategori ?? 'Posisi Umum' }}</p>
                        <p class="text-[#007E5D] font-medium mb-4 text-sm">{{ $lowongan->kuota_lowongan }} Kuota |
                            {{ $lowongan->pelamar_count }} Pelamar</p>

                        <div class="flex flex-wrap gap-3 mb-6">
                            @if ($lowongan->durasi)
                                <span
                                    class="border border-[#007E5D] text-[#007E5D] px-4 py-1 rounded-full text-sm">{{ $lowongan->durasi }}</span>
                            @endif
                            <span
                                class="border border-[#007E5D] text-[#007E5D] px-4 py-1 rounded-full text-sm">{{ $lowongan->tipe_pekerjaan }}</span>
                        </div>


                        <hr class="my-4 border-gray-200">

                        <p class="text-sm text-gray-700 mb-2">Penutupan:
                            @if ($lowongan->tanggal_tutup)
                                <span
                                    class="text-red-500 font-medium">{{ \Carbon\Carbon::parse($lowongan->tanggal_tutup)->translatedFormat('d F Y') }}</span>
                            @else
                                <span class="text-green-600 font-medium">Terbuka</span>
                            @endif
                            </p>
                        <div class="flex items-center gap-2 text-gray-500 text-sm bg-gray-100 px-3 py-2 rounded-lg">
                            <i class="fa-regular fa-calendar"></i>
                            <span>Dibuat
                                {{ \Carbon\Carbon::parse($lowongan->tanggal_input)->diffForHumans() }}</span>
                        </div>

                    </div>

                    <a href="{{ route('public.lowongan.detail', $lowongan->id) }}"
                        class="mt-6 block text-center bg-[#FCD12A] text-[#1A1A1A] font-semibold py-3 rounded-lg hover:bg-yellow-400 transition duration-300">
                        Lihat Detail
                    </a>
                </div>
            @empty
                <div
                    class="col-span-1 md:col-span-2 lg:col-span-3 text-center py-10 text-gray-600 border border-gray-300 rounded-lg">
                    <h4 class="text-xl font-semibold">Lowongan Tidak Ditemukan</h4>
                    <p class="mt-2">Tidak ada lowongan yang sesuai dengan kriteria pencarian Anda.</p>
                </div>
            @endforelse

        </div>
    </section>

    @if ($lowongans->lastPage() > 1)
        <div class="flex justify-center items-center gap-3 mt-16 mb-20">
            {!! $lowongans->appends(request()->query())->fragment('lowongan-grid')->links('vendor.pagination.tailwind') !!}
        </div>
    @endif


    @include('../Public/Section4')
@endsection
