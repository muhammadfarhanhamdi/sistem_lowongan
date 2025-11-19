@extends('layoutspublic.app')

@section('content')

<div class="max-w-7xl mx-auto p-6 grid grid-cols-12 gap-6 pt-12 ">

    <!-- SIDEBAR -->
    <div class="col-span-4 bg-white shadow-md rounded-2xl p-6 h-max">

        <div class="flex items-center gap-4 mb-6">
            <div class="w-16 h-16 bg-gray-200 rounded-full"></div>

            <div>
                <h1 class="text-xl font-semibold">Muhammad Farhan Hamdi</h1>
                <p class="text-gray-600 text-sm">hamdiiifahran@gmail.com</p>
                
            </div>
        </div>

        <ul class="space-y-5 text-gray-700">
            <li class="flex items-center gap-3 text-blue-700 font-semibold">
                📄 <span>Curriculum Vitae</span>
            </li>
            <li class="flex items-center gap-3">🔑 Pengaturan Keamanan</li>
            <li class="flex items-center gap-3">📟 Lapor! (Support)</li>
            <li class="flex items-center gap-3">🖥️ Simulasi Wawancara</li>
            <li class="flex items-center gap-3">📘 Manual Pengguna</li>
            <li class="flex items-center gap-3 text-red-500 font-semibold">⏻ Keluar</li>
        </ul>
    </div>

    <!-- RIGHT CONTENT -->
    <div class="col-span-8">

        <!-- CARD -->
        <div class="bg-white shadow-md rounded-2xl p-8">

            <!-- TABS -->
            <div class="flex gap-4 border-b pb-3 mb-6">

                <button class="px-4 py-2 rounded-lg bg-blue-100 text-blue-700 font-medium">
                    Data Pribadi
                </button>

                <button class="px-4 py-2 text-gray-600">
                    Data Akademik
                </button>

                <button class="px-4 py-2 text-gray-600">
                    Data Keluarga
                </button>

                <button class="px-4 py-2 text-gray-600">
                    Dokumen
                </button>

            </div>

            <!-- CONTENT TITLE -->
            <h2 class="text-xl font-bold mb-2">Data Pribadi</h2>
            <p class="text-gray-600 mb-4">
                Pastikan data pribadi benar untuk mempermudah proses pendaftaran
            </p>

            <div class="border-b mb-6"></div>

            <h3 class="text-lg font-bold mb-4">Biodata</h3>

            <!-- GRID DATA -->
            <div class="grid grid-cols-2 gap-y-8">

                <div>
                    <p class="font-semibold">Tentang Saya</p>
                    <p class="text-gray-500 text-sm">Data belum diisi</p>
                </div>

                <div>
                    <p class="font-semibold">Jenis Kelamin</p>
                    <p class="text-gray-500 text-sm">Data belum diisi</p>
                </div>

                <div>
                    <p class="font-semibold">Nama Lengkap</p>
                    <p class="text-gray-700 text-sm">Muhammad Farhan Hamdi</p>
                </div>

                <div>
                    <p class="font-semibold">Tanggal Lahir</p>
                    <p class="text-gray-500 text-sm">Data belum diisi</p>
                </div>

                <div>
                    <p class="font-semibold">NIK</p>
                    <p class="text-gray-500 text-sm">Data belum diisi</p>
                </div>

                <div>
                    <p class="font-semibold">Tempat Lahir</p>
                    <p class="text-gray-500 text-sm">Data belum diisi</p>
                </div>

                <div>
                    <p class="font-semibold">Email</p>
                    <p class="text-gray-700 text-sm">hamdiiifahran@gmail.com</p>
                </div>

                <div>
                    <p class="font-semibold">No Handphone</p>
                    <p class="text-gray-700 text-sm">081386894818</p>
                </div>

                <div>
                    <p="font-semibold">Nama Bank</p>
                    <p class="text-gray-500 text-sm">Data belum diisi</p>
                </div>

                <div>
                    <p class="font-semibold">No Rekening</p>
                    <p class="text-gray-500 text-sm">Data belum diisi</p>
                </div>

                <div class="col-span-2">
                    <p class="font-semibold">Alamat Tempat Tinggal</p>
                    <p class="text-gray-500 text-sm">Data belum diisi</p>
                </div>

            </div>

        </div>
    </div>

</div>

@endsection
