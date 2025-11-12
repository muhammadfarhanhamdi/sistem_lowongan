@extends('layouts.app')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div>
            <ol class="breadcrumb fs-sm mb-1">
                <li class="breadcrumb-item">Data Administrasi</li>
                <li class="breadcrumb-item"><a href="{{ route('admin.satuan_kerja.index') }}">Daftar Satuan Kerja</a></li>
            </ol>
            <h4 class="main-title mb-0">Tambah Satuan Kerja</h4>
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
                <form action="{{ route('admin.satuan_kerja.store') }}" method="POST">
                    @csrf
                    @method('POST')

                    <div class="mb-3">
                        <label for="nama_satuan" class="form-label fw-bold">Nama Satuan Kerja</label>
                        <input required type="text" class="form-control" id="nama_satuan" name="nama_satuan"
                            placeholder="Masukan Nama Satuan Kerja" value="{{ old('nama_satuan') }}">
                    </div>

                    <div class="mb-3">
                        <label for="kuota" class="form-label fw-bold">Kuota</label>
                        <input required type="number" class="form-control" id="kuota" name="kuota"
                            placeholder="Masukan Kuota" value="{{ old('kuota', 0) }}">
                    </div>

                    <div class="mb-3">
                        <label for="deskripsi" class="form-label fw-bold">Deskripsi</label>
                        <textarea class="form-control" id="deskripsi" name="deskripsi" rows="4"
                            placeholder="Masukan Deskripsi (Opsional)">{{ old('deskripsi') }}</textarea>
                    </div>

                    <input type="submit" value="Simpan" class="btn btn-primary">
                </form>
            </div>
        </div>
    </div>
@endsection