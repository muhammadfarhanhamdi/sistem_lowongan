@extends('layoutspublic.app')

@section('content')
<div class="max-w-4xl mx-auto py-10">
    <h1 class="text-2xl font-semibold mb-4">Lamaran Saya</h1>

    @if($pendaftaran->isEmpty())
        <div class="p-4 bg-white border rounded">Belum ada lamaran. Kunjungi halaman lowongan untuk melamar.</div>
    @else
        <div class="space-y-4">
            @foreach($pendaftaran as $item)
                <div class="p-4 bg-white border rounded flex justify-between items-start">
                    <div>
                        <div class="font-medium">{{ optional($item->lowongan)->judul_lowongan ?? 'Lowongan tidak tersedia' }}</div>
                        <div class="text-sm text-gray-500">Tanggal daftar: {{ optional($item->tanggal_daftar) ?? '-' }}</div>
                        <div class="mt-2 text-sm">Status: <span class="font-semibold">{{ $item->status_penerimaan ?? 'menunggu' }}</span></div>
                    </div>
                    <div class="text-right">
                        <a href="{{ route('public.lowongan.detail', optional($item->lowongan)->id ?? '#') }}" class="px-3 py-1 bg-indigo-600 text-white rounded">Lihat Lowongan</a>
                    </div>
                </div>
            @endforeach
        </div>
    @endif

</div>
@endsection
