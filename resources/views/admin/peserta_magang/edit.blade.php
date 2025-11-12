@extends('layouts.app')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div>
            <ol class="breadcrumb fs-sm mb-1">
                <li class="breadcrumb-item">Manajemen Peserta</li>
                <li class="breadcrumb-item"><a href="{{ route('admin.peserta_magang.index') }}">Daftar Peserta Magang</a></li>
            </ol>
            <h4 class="main-title mb-0">Edit Data Peserta Magang</h4>
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
                <form action="{{ route('admin.peserta_magang.update', $peserta->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="id_user" class="form-label fw-bold">Pilih User Peserta</label>
                                <select required class="form-select" id="id_user" name="id_user">
                                    <option value="" disabled>-- Pilih User (Role: Peserta Magang) --</option>
                                    @foreach($users as $user)
                                        <option value="{{ $user->id }}" {{ old('id_user', $peserta->id_user) == $user->id ? 'selected' : '' }}>
                                            {{ $user->name }} ({{ $user->username }})
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="asal_institusi" class="form-label fw-bold">Asal Institusi</label>
                                <input required type="text" class="form-control" id="asal_institusi" name="asal_institusi"
                                    placeholder="Cth: Universitas X" value="{{ old('asal_institusi', $peserta->asal_institusi) }}">
                            </div>
                            
                            <div class="mb-3">
                                <label for="nim" class="form-label fw-bold">NIM / Nomor Induk (Opsional)</label>
                                <input type="text" class="form-control" id="nim" name="nim"
                                    placeholder="Masukan NIM/NPM" value="{{ old('nim', $peserta->nim) }}">
                            </div>

                            <div class="mb-3">
                                <label for="jurusan" class="form-label fw-bold">Jurusan</label>
                                <input type="text" class="form-control" id="jurusan" name="jurusan"
                                    placeholder="Cth: Teknik Informatika" value="{{ old('jurusan', $peserta->jurusan) }}">
                            </div>

                            <div class="mb-3">
                                <label for="fakultas" class="form-label fw-bold">Fakultas</label>
                                <input type="text" class="form-control" id="fakultas" name="fakultas"
                                    placeholder="Cth: Sains dan Teknologi" value="{{ old('fakultas', $peserta->fakultas) }}">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="tanggal_mulai_magang" class="form-label fw-bold">Tanggal Mulai Magang (Opsional)</label>
                                <input type="date" class="form-control" id="tanggal_mulai_magang" name="tanggal_mulai_magang"
                                    value="{{ old('tanggal_mulai_magang', $peserta->tanggal_mulai_magang) }}">
                            </div>
                            
                            <div class="mb-3">
                                <label for="tanggal_selesai_magang" class="form-label fw-bold">Tanggal Selesai Magang (Opsional)</label>
                                <input type="date" class="form-control" id="tanggal_selesai_magang" name="tanggal_selesai_magang"
                                    value="{{ old('tanggal_selesai_magang', $peserta->tanggal_selesai_magang) }}">
                            </div>
                            
                        </div>
                    </div>

                    <input type="submit" value="Simpan Perubahan" class="btn btn-primary">
                </form>
            </div>
        </div>
    </div>
@endsection