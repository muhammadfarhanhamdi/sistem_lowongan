<?php /* Blade view: admin dokumen index */ ?>
@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Daftar Dokumen</h1>

    <form class="mb-4" method="GET">
        <div class="flex gap-2">
            <input type="text" name="q" value="{{ request('q') }}" placeholder="Cari NIM atau Institusi" class="form-control" />
            <select name="jenis" class="form-control">
                <option value="">Semua Jenis</option>
                <option value="CV" {{ request('jenis')=='CV' ? 'selected' : '' }}>CV</option>
                <option value="Surat Pengantar" {{ request('jenis')=='Surat Pengantar' ? 'selected' : '' }}>Surat Pengantar</option>
            </select>
            <button class="btn btn-primary">Filter</button>
        </div>
    </form>

    <div class="card">
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Peserta (NIM / Institusi)</th>
                        <th>Jenis</th>
                        <th>Tanggal Upload</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($dokumen as $d)
                    <tr>
                        <td>{{ $d->id }}</td>
                        <td>{{ optional($d->peserta)->nim ?? '-' }} / {{ optional($d->peserta)->asal_institusi ?? '-' }}</td>
                        <td>{{ $d->jenis_dokumen }}</td>
                        <td>{{ $d->tanggal_upload }}</td>
                        <td><a class="btn btn-sm btn-outline-primary" href="{{ asset($d->file_path) }}" target="_blank">Lihat / Unduh</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            {{ $dokumen->withQueryString()->links() }}
        </div>
    </div>
</div>

@endsection
