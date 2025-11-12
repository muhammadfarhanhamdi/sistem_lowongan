@extends('layouts.app')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div>
            <ol class="breadcrumb fs-sm mb-1">
                <li class="breadcrumb-item">Manajemen Lowongan</li>
                <li class="breadcrumb-item"><a href="{{ route('admin.jenjang_pendidikan.index') }}">Daftar Jenjang Pendidikan</a></li>
            </ol>
            <h4 class="main-title mb-0">Tambah Jenjang Pendidikan</h4>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.jenjang_pendidikan.store') }}" method="POST">
                @csrf
                @method('POST')
                <div class="mb-3">
                    <label for="nama_jenjang" class="form-label fw-bold">Nama Jenjang</label>
                    <input required type="text" class="form-control w-50" id="nama_jenjang" name="nama_jenjang"
                        placeholder="Cth: S1" value="{{ old('nama_jenjang') }}">
                </div>
                <input type="submit" value="Simpan" class="btn btn-primary">
            </form>
        </div>
    </div>
@endsection