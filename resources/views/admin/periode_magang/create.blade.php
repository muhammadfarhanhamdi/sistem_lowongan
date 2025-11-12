@extends('layouts.app')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div>
            <ol class="breadcrumb fs-sm mb-1">
                <li class="breadcrumb-item">Manajemen Lowongan</li>
                <li class="breadcrumb-item"><a href="{{ route('admin.periode_magang.index') }}">Daftar Periode Magang</a></li>
            </ol>
            <h4 class="main-title mb-0">Tambah Periode Magang</h4>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            <div class="mb-3">
                <form action="{{ route('admin.periode_magang.store') }}" method="POST">
                    @csrf
                    @method('POST')

                    <div class="mb-3">
                        <label for="nama_periode" class="form-label fw-bold">Nama Periode</label>
                        <input required type="text" class="form-control" id="nama_periode" name="nama_periode"
                            placeholder="Cth: Periode Magang Ganjil 2026" value="{{ old('nama_periode') }}">
                    </div>

                    <div class="mb-3">
                        <label for="tanggal_mulai" class="form-label fw-bold">Tanggal Mulai</label>
                        <input required type="date" class="form-control" id="tanggal_mulai" name="tanggal_mulai"
                            value="{{ old('tanggal_mulai') }}">
                    </div>

                    <div class="mb-3">
                        <label for="tanggal_selesai" class="form-label fw-bold">Tanggal Selesai</label>
                        <input required type="date" class="form-control" id="tanggal_selesai" name="tanggal_selesai"
                            value="{{ old('tanggal_selesai') }}">
                    </div>

                    <input type="submit" value="Simpan" class="btn btn-primary">
                </form>
            </div>
        </div>
    </div>
@endsection