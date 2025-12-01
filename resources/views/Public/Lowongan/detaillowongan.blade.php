@extends('layoutspublic.app')

@section('content')
<div class="container mx-auto py-10 px-4 grid grid-cols-1 md:grid-cols-3 gap-6">

    <!-- Bagian Kiri: 1 Kolom -->
    <div class="flex flex-col gap-8">
        @for ($i = 0; $i < 6; $i++)
            <div class="border-2 border-[#007E5D] rounded-2xl p-8 hover:shadow-lg transition duration-300 flex flex-col justify-between">
                <div>
                    <img src="{{ asset('images/logo_pustek.png') }}" alt="Pustekinfo" class="h-32">

                    <h3 class="text-xl font-semibold mb-1 text-[#1A1A1A]">
                        Pusat Teknologi Informasi
                    </h3>

                    <p class="text-gray-600 text-sm mb-2">WEB DEVELOPER</p>

                    <p class="text-[#007E5D] font-medium mb-4 text-sm">
                        2 Kuota | 10 Pelamar
                    </p>

                    <div class="flex gap-3 mb-6">
                        <span class="border border-[#007E5D] text-[#007E5D] px-4 py-1 rounded-full text-sm">
                            3 Bulan
                        </span>
                        <span class="border border-[#007E5D] text-[#007E5D] px-4 py-1 rounded-full text-sm">
                            Onsite
                        </span>
                    </div>

                    <hr class="my-4">

                    <p class="text-sm text-gray-700 mb-2">
                        Penutupan:
                        <span class="text-red-500 font-medium">10 November 2025</span>
                    </p>

                    <div class="flex items-center gap-2 text-gray-500 text-sm bg-gray-100 px-3 py-2 rounded-lg">
                        <i class="fa-regular fa-calendar"></i>
                        <span>Dibuat 1 bulan yang lalu</span>
                    </div>
                </div>

                <a href="#"
                   class="mt-6 block text-center bg-[#FCD12A] text-[#1A1A1A] font-semibold py-3 rounded-lg hover:bg-yellow-400 transition duration-300">
                    Lihat Detail
                </a>
            </div>
        @endfor
    </div>

    <!-- Bagian Kanan (Detail) -->
    <div class="md:col-span-2 border rounded-xl p-8 bg-white shadow-sm">

        @if(session('success'))
            <div class="mb-4 p-3 rounded-lg bg-green-50 text-green-700">{{ session('success') }}</div>
        @endif
        @if(session('error'))
            <div class="mb-4 p-3 rounded-lg bg-red-50 text-red-700">{{ session('error') }}</div>
        @endif

        <div class="flex items-center gap-3 mb-5">
            <img src="{{ asset('images/logo_pustek.png') }}" class="w-12" alt="Logo" />
            <div>
                <h2 class="text-xl font-bold">Pusat Teknologi Informasi</h2>
                <p class="text-xs text-gray-500">2 Posisi | 119 Pelamar</p>
            </div>
        </div>

        <hr class="my-4" />

        <h3 class="font-semibold mb-2">📚 Pendidikan</h3>
        <p class="text-sm mb-4">
            Jurusan: Teknik Informatika, Sistem Informasi, Ilmu Komputer
        </p>

        <h3 class="font-semibold mb-2">📄 Persyaratan Dokumen</h3>
        <ul class="text-sm mb-4 list-disc ml-5">
            <li>CV</li>
            <li>KTP</li>
            <li>Transkrip Nilai</li>
        </ul>

        <h3 class="font-semibold mb-2">🛈 Informasi Penting</h3>
        <p class="text-sm mb-4">
            Durasi: 6 Bulan <br>
            Tanggal Penutupan: 22 November 2025 <br>
            Pengumuman Seleksi: 1 Desember 2025
        </p>

        <h3 class="font-semibold mb-2">📝 Deskripsi</h3>
        <p class="text-sm leading-relaxed text-gray-600">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
        </p>

        <div class="mt-6">
            @guest
                <a href="{{ route('login') }}?redirect={{ urlencode(url()->current()) }}" class="inline-block bg-blue-600 text-white px-6 py-3 rounded-lg font-semibold hover:bg-blue-700 transition">
                    Login untuk Lamar
                </a>
            @endguest

            @auth
                <form id="applyForm" method="POST" action="{{ route('public.lowongan.apply', $lowongan->id ?? 0) }}">
                    @csrf
                    <button id="applyBtn" type="submit" class="inline-block bg-amber-400 text-black px-6 py-3 rounded-lg font-semibold hover:bg-amber-300 transition">Lamar Sekarang</button>
                </form>
                
                <!-- Modal for incomplete profile -->
                <div id="incompleteModal" class="fixed inset-0 bg-black/40 hidden items-center justify-center z-50">
                    <div class="bg-white rounded-lg shadow-lg max-w-md w-full p-6">
                        <h3 class="text-lg font-semibold mb-2">Profil Belum Lengkap</h3>
                        <p id="incompleteList" class="text-sm text-gray-700 mb-4"></p>
                        <div class="flex justify-end gap-3">
                            <button id="modalCancel" class="px-4 py-2 border rounded">Batal</button>
                            <a id="goProfile" href="{{ route('profile') }}" class="px-4 py-2 bg-yellow-400 text-black rounded font-semibold">Lengkapi Profil</a>
                        </div>
                    </div>
                </div>
            @endauth
        </div>
    </div>

</div>
@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    const applyForm = document.getElementById('applyForm');
    const applyBtn = document.getElementById('applyBtn');
    const modal = document.getElementById('incompleteModal');
    const incompleteList = document.getElementById('incompleteList');
    const modalCancel = document.getElementById('modalCancel');

    if (applyForm) {
        applyForm.addEventListener('submit', function (e) {
            e.preventDefault();
            applyBtn.disabled = true;
            fetch('{{ route('profile.check.complete') }}', { credentials: 'same-origin' })
                .then(res => res.json())
                .then(json => {
                    if (json.complete) {
                        applyForm.submit();
                    } else {
                        // show modal with missing fields
                        incompleteList.textContent = 'Silakan lengkapi: ' + (json.missing || []).join(', ');

                        // map first missing item to a form field name and section
                        const first = (json.missing && json.missing.length) ? json.missing[0] : null;
                        function mapToField(item) {
                            if (!item) return { field: 'name', section: 'edit-profile' };
                            item = item.toLowerCase();
                            if (item.includes('nama')) return { field: 'name', section: 'edit-profile' };
                            if (item.includes('handphone') || item.includes('hp') || item.includes('telepon')) return { field: 'telepon', section: 'edit-profile' };
                            if (item.includes('pendidikan')) return { field: 'pendidikan', section: 'edit-profile' };
                            if (item.includes('alamat')) return { field: 'alamat', section: 'edit-profile' };
                            if (item.includes('asal institusi') || item.includes('data peserta')) return { field: 'asal_institusi', section: 'peserta-profile' };
                            if (item.includes('cv')) return { field: 'cv', section: 'peserta-profile' };
                            return { field: 'name', section: 'edit-profile' };
                        }

                        const mapped = mapToField(first);
                        const profileUrl = '{{ route('profile') }}';
                        const href = profileUrl + '?focus=' + encodeURIComponent(mapped.field) + '#' + mapped.section;
                        const goProfileBtn = document.getElementById('goProfile');
                        if (goProfileBtn) goProfileBtn.setAttribute('href', href);

                        modal.classList.remove('hidden');
                        modal.classList.add('flex');
                        applyBtn.disabled = false;
                    }
                })
                .catch(err => {
                    console.error(err);
                    // fallback: submit the form (server-side will still re-check)
                    applyForm.submit();
                });
        });
    }

    if (modalCancel) modalCancel.addEventListener('click', function () { modal.classList.add('hidden'); modal.classList.remove('flex'); });
});
</script>
@endpush
@endsection
