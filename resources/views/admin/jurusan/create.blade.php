@extends('layouts.app')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div>
            <ol class="breadcrumb fs-sm mb-1">
                <li class="breadcrumb-item">Manajemen Lowongan</li>
                <li class="breadcrumb-item"><a href="{{ route('admin.jurusan.index') }}">Daftar Jurusan</a></li>
            </ol>
            <h4 class="main-title mb-0">Tambah Jurusan</h4>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.jurusan.store') }}" method="POST">
                @csrf
                @method('POST')
                <div class="mb-3">
                    <label for="nama_jurusan" class="form-label fw-bold">Nama Jurusan</label>
                    <input required type="text" class="form-control w-50" id="nama_jurusan" name="nama_jurusan"
                        placeholder="Cth: Teknik Informatika" value="{{ old('nama_jurusan') }}">
                </div>
                <input type="submit" value="Simpan" class="btn btn-primary">
            </form>
        </div>
    </div>
@endsection