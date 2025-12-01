@extends('layouts.app')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4 ">
    <div>
        <ol class="breadcrumb fs-sm mb-1 ">
            <li class="breadcrumb-item">Manajemen Lowongan</li>
            <li class="breadcrumb-item active" aria-current="page">Detail Pendaftaran</li>
        </ol>
        <h4 class="main-title mb-0">Detail Pendaftaran #{{ $item->id }}</h4>
    </div>
    <div>
        <a href="{{ route('admin.pendaftaran.index') }}" class="btn btn-secondary">Kembali</a>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <form class="row g-3">
            <div class="col-md-6">
                <label class="form-label">Lowongan</label>
                <input class="form-control" value="{{ optional($item->lowongan)->judul_lowongan ?? '-' }}" readonly disabled>
            </div>
            <div class="col-md-3">
                <label class="form-label">Tanggal Daftar</label>
                <input class="form-control" value="{{ $item->tanggal_daftar ? \Carbon\Carbon::parse($item->tanggal_daftar)->format('d M Y H:i') : '-' }}" readonly disabled>
            </div>
            <div class="col-md-3">
                <label class="form-label">Status Penerimaan</label>
                <input class="form-control" value="{{ $item->status_penerimaan ?? '-' }}" readonly disabled>
            </div>

            <hr class="my-3" />

            <div class="col-md-6">
                <label class="form-label">Nama Pelamar</label>
                <input class="form-control" value="{{ optional(optional($item->peserta)->user)->name ?? optional($item->peserta)->nama_lengkap ?? ('User #' . (optional($item->peserta)->id_user ?? '-')) }}" readonly disabled>
            </div>
            <div class="col-md-3">
                <label class="form-label">Email</label>
                <input class="form-control" value="{{ optional(optional($item->peserta)->user)->email ?? '-' }}" readonly disabled>
            </div>
            <div class="col-md-3">
                <label class="form-label">Telepon</label>
                <input class="form-control" value="{{ optional(optional($item->peserta)->user)->telepon ?? optional($item->peserta)->telepon ?? '-' }}" readonly disabled>
            </div>

            <div class="col-md-12">
                <label class="form-label">Alamat</label>
                <textarea class="form-control" rows="2" readonly disabled>{{ optional(optional($item->peserta)->user)->alamat ?? optional($item->peserta)->alamat ?? '-' }}</textarea>
            </div>

            <div class="col-md-3">
                <label class="form-label">Tanggal Lahir</label>
                @php
                    $dob = optional(optional($item->peserta)->user)->tanggal_lahir ?? optional($item->peserta)->tanggal_lahir;
                    try { $dobFormatted = $dob ? \Carbon\Carbon::parse($dob)->format('d M Y') : '-'; } catch(\Exception $e) { $dobFormatted = $dob ?? '-'; }
                @endphp
                <input class="form-control" value="{{ $dobFormatted }}" readonly disabled>
            </div>

            <div class="col-md-3">
                <label class="form-label">NIM</label>
                <input class="form-control" value="{{ optional($item->peserta)->nim ?? '-' }}" readonly disabled>
            </div>
            <div class="col-md-3">
                <label class="form-label">Asal Institusi</label>
                <input class="form-control" value="{{ optional($item->peserta)->asal_institusi ?? '-' }}" readonly disabled>
            </div>
            <div class="col-md-3">
                <label class="form-label">Jurusan</label>
                <input class="form-control" value="{{ optional($item->peserta)->jurusan ?? '-' }}" readonly disabled>
            </div>

            <div class="col-md-3">
                <label class="form-label">Tanggal Mulai</label>
                @php $mulai = optional($item->peserta)->tanggal_mulai_magang; try { $mulaiF = $mulai ? \Carbon\Carbon::parse($mulai)->format('d M Y') : '-'; } catch(\Exception $e) { $mulaiF = $mulai ?? '-'; } @endphp
                <input class="form-control" value="{{ $mulaiF }}" readonly disabled>
            </div>
            <div class="col-md-3">
                <label class="form-label">Tanggal Selesai</label>
                @php $selesai = optional($item->peserta)->tanggal_selesai_magang; try { $selesaiF = $selesai ? \Carbon\Carbon::parse($selesai)->format('d M Y') : '-'; } catch(\Exception $e) { $selesaiF = $selesai ?? '-'; } @endphp
                <input class="form-control" value="{{ $selesaiF }}" readonly disabled>
            </div>

            <div class="col-12">
                @php
                    $dokumenList = collect();
                    try {
                        $dokumenList = \App\Models\DokumenModel::where('id_peserta', optional($item->peserta)->id)
                            ->orderBy('tanggal_upload', 'desc')
                            ->get();
                    } catch (\Throwable $e) {
                        $dokumenList = collect();
                    }
                @endphp
                <label class="form-label">Dokumen Pelamar</label>
                @if($dokumenList->isNotEmpty())
                    <div class="row g-2">
                        @foreach($dokumenList as $dok)
                            @php
                                $fileUrl = $dok->file_path;
                                $fileName = basename($fileUrl);
                                $ext = pathinfo($fileName, PATHINFO_EXTENSION);
                            @endphp
                            <div class="col-md-6">
                                <div class="card p-2 h-100">
                                    <div class="d-flex align-items-center">
                                        <div class="me-3 text-center" style="width:48px">
                                            @if(strtolower($ext) === 'pdf')
                                                <i class="ri-file-pdf-line" style="font-size:28px;color:#e55353"></i>
                                            @else
                                                <i class="ri-file-text-line" style="font-size:28px;color:#6c757d"></i>
                                            @endif
                                        </div>
                                        <div class="flex-fill">
                                            <div class="fw-semibold">{{ $fileName }}</div>
                                            <div class="text-muted small">{{ $dok->jenis_dokumen ?? '' }} • {{ $dok->tanggal_upload ? \Carbon\Carbon::parse($dok->tanggal_upload)->format('d M Y H:i') : '' }}</div>
                                        </div>
                                        <div class="ms-3">
                                            <a href="{{ asset($fileUrl) }}" target="_blank" class="btn btn-sm btn-outline-primary">Lihat</a>
                                            <a href="{{ asset($fileUrl) }}" download class="btn btn-sm btn-outline-secondary">Unduh</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="text-muted">Belum ada dokumen diunggah.</div>
                @endif
            </div>

        </form>
    </div>

    <div class="card-footer">
        <div class="d-flex gap-2">
            <form action="{{ route('admin.pendaftaran.approve', $item->id) }}" method="POST" style="display:inline" class="confirm-form">
                @csrf
                <button class="btn btn-success" type="submit" data-confirm="Setujui pendaftaran #{{ $item->id }}?">Terima</button>
            </form>
            <form action="{{ route('admin.pendaftaran.reject', $item->id) }}" method="POST" style="display:inline" class="confirm-form">
                @csrf
                <button class="btn btn-danger" type="submit" data-confirm="Tolak pendaftaran #{{ $item->id }}?">Tolak</button>
            </form>
        </div>
    </div>
</div>

@endsection
