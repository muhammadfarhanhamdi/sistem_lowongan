@extends('layouts.app')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div>
            <ol class="breadcrumb fs-sm mb-1">
                <li class="breadcrumb-item">Manajemen Lowongan</li>
                <li class="breadcrumb-item"><a href="{{ route('admin.lowongan.index') }}">Daftar Lowongan</a></li>
            </ol>
            <h4 class="main-title mb-0">Edit Lowongan: {{ $lowongan->judul_lowongan }}</h4>
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
            <form action="{{ route('admin.lowongan.update', $lowongan->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="judul_lowongan" class="form-label fw-bold">Judul Lowongan</label>
                            <input required type="text" class="form-control" id="judul_lowongan" name="judul_lowongan"
                                placeholder="Cth: Magang Web Developer" value="{{ old('judul_lowongan', $lowongan->judul_lowongan) }}">
                        </div>

                        <div class="mb-3">
                            <label for="id_satuan_kerja" class="form-label fw-bold">Satuan Kerja</label>
                            <select required class="form-select" id="id_satuan_kerja" name="id_satuan_kerja">
                                <option value="" disabled>-- Pilih Satuan Kerja --</option>
                                @foreach($satuanKerjas as $satuanKerja)
                                    <option value="{{ $satuanKerja->id }}" {{ old('id_satuan_kerja', $lowongan->id_satuan_kerja) == $satuanKerja->id ? 'selected' : '' }}>
                                        {{ $satuanKerja->nama_satuan }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="id_kategori_lowongan" class="form-label fw-bold">Kategori Posisi</label>
                            <select required class="form-select" id="id_kategori_lowongan" name="id_kategori_lowongan">
                                <option value="" disabled>-- Pilih Kategori --</option>
                                @foreach($kategoris as $kategori)
                                    <option value="{{ $kategori->id }}" {{ old('id_kategori_lowongan', $lowongan->id_kategori_lowongan) == $kategori->id ? 'selected' : '' }}>
                                        {{ $kategori->nama_kategori }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="id_periode" class="form-label fw-bold">Periode Magang (Opsional)</label>
                            <select class="form-select" id="id_periode" name="id_periode">
                                <option value="" selected>-- Pilih Periode --</option>
                                @foreach($periodes as $periode)
                                    <option value="{{ $periode->id }}" {{ old('id_periode', $lowongan->id_periode) == $periode->id ? 'selected' : '' }}>
                                        {{ $periode->nama_periode }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        
                        <div class="mb-3">
                            <label for="kuota_lowongan" class="form-label fw-bold">Kuota Lowongan</label>
                            <input required type="number" class="form-control" id="kuota_lowongan" name="kuota_lowongan"
                                placeholder="Jumlah kuota yang dibuka" value="{{ old('kuota_lowongan', $lowongan->kuota_lowongan) }}">
                        </div>

                        <div class="mb-3">
                            <label for="tipe_pekerjaan" class="form-label fw-bold">Tipe Pekerjaan</label>
                            <select required class="form-select" id="tipe_pekerjaan" name="tipe_pekerjaan">
                                <option value="" disabled>-- Pilih Tipe --</option>
                                <option value="Onsite" {{ old('tipe_pekerjaan', $lowongan->tipe_pekerjaan) == 'Onsite' ? 'selected' : '' }}>Onsite</option>
                                <option value="Remote" {{ old('tipe_pekerjaan', $lowongan->tipe_pekerjaan) == 'Remote' ? 'selected' : '' }}>Remote</option>
                                <option value="Hybrid" {{ old('tipe_pekerjaan', $lowongan->tipe_pekerjaan) == 'Hybrid' ? 'selected' : '' }}>Hybrid</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="durasi" class="form-label fw-bold">Durasi (Cth: 3 Bulan)</label>
                            <input type="text" class="form-control" id="durasi" name="durasi"
                                placeholder="Cth: 3 Bulan" value="{{ old('durasi', $lowongan->durasi) }}">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="tanggal_buka" class="form-label fw-bold">Tanggal Buka</label>
                            <input type="date" class="form-control" id="tanggal_buka" name="tanggal_buka"
                                value="{{ old('tanggal_buka', $lowongan->tanggal_buka) }}">
                        </div>

                        <div class="mb-3">
                            <label for="tanggal_tutup" class="form-label fw-bold">Tanggal Penutupan</label>
                            <input type="date" class="form-control" id="tanggal_tutup" name="tanggal_tutup"
                                value="{{ old('tanggal_tutup', $lowongan->tanggal_tutup) }}">
                        </div>

                        <div class="mb-3">
                            <label for="deskripsi" class="form-label fw-bold">Deskripsi Lowongan</label>
                            <textarea class="form-control" id="deskripsi" name="deskripsi" rows="5"
                                placeholder="Masukkan deskripsi detail lowongan">{{ old('deskripsi', $lowongan->deskripsi) }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label for="kualifikasi" class="form-label fw-bold">Kualifikasi / Persyaratan</label>
                            <textarea class="form-control" id="kualifikasi" name="kualifikasi" rows="5"
                                placeholder="Masukkan poin-poin kualifikasi">{{ old('kualifikasi', $lowongan->kualifikasi) }}</textarea>
                        </div>
                    </div>
                </div>

                <hr>
                <input type="submit" value="Simpan Perubahan" class="btn btn-primary">
            </form>
        </div>
    </div>
@endsection