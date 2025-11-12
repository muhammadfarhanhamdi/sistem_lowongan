@extends('layouts.app')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div>
            <ol class="breadcrumb fs-sm mb-1">
                <li class="breadcrumb-item">Manajemen Lowongan</li>
                <li class="breadcrumb-item"><a href="{{ route('admin.lowongan.index') }}">Daftar Lowongan</a></li>
            </ol>
            <h4 class="main-title mb-0">Tambah Lowongan</h4>
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
            <form action="{{ route('admin.lowongan.store') }}" method="POST">
                @csrf
                @method('POST')
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="judul_lowongan" class="form-label fw-bold">Judul Lowongan</label>
                            <input required type="text" class="form-control" id="judul_lowongan" name="judul_lowongan"
                                placeholder="Cth: Magang Web Developer" value="{{ old('judul_lowongan') }}">
                        </div>

                        <div class="mb-3">
                            <label for="id_satuan_kerja" class="form-label fw-bold">Satuan Kerja</label>
                            <select required class="form-select" id="id_satuan_kerja" name="id_satuan_kerja">
                                <option value="" disabled selected>-- Pilih Satuan Kerja --</option>
                                @foreach($satuanKerjas as $satuanKerja)
                                    <option value="{{ $satuanKerja->id }}" {{ old('id_satuan_kerja') == $satuanKerja->id ? 'selected' : '' }}>
                                        {{ $satuanKerja->nama_satuan }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="id_kategori_lowongan" class="form-label fw-bold">Kategori Posisi</label>
                            <select required class="form-select" id="id_kategori_lowongan" name="id_kategori_lowongan">
                                <option value="" disabled selected>-- Pilih Kategori --</option>
                                @foreach($kategoris as $kategori)
                                    <option value="{{ $kategori->id }}" {{ old('id_kategori_lowongan') == $kategori->id ? 'selected' : '' }}>
                                        {{ $kategori->nama_kategori }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="id_jenjang_pendidikan" class="form-label fw-bold">Jenjang Pendidikan (Min)</label>
                            <select required class="form-select" id="id_jenjang_pendidikan" name="id_jenjang_pendidikan">
                                <option value="" disabled selected>-- Pilih Jenjang Pendidikan --</option>
                                @foreach($jenjangs as $jenjang)
                                    <option value="{{ $jenjang->id }}" {{ old('id_jenjang_pendidikan') == $jenjang->id ? 'selected' : '' }}>
                                        {{ $jenjang->nama_jenjang }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="id_periode" class="form-label fw-bold">Periode Magang (Opsional)</label>
                            <select class="form-select" id="id_periode" name="id_periode">
                                <option value="" selected>-- Pilih Periode --</option>
                                @foreach($periodes as $periode)
                                    <option value="{{ $periode->id }}" {{ old('id_periode') == $periode->id ? 'selected' : '' }}>
                                        {{ $periode->nama_periode }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        
                        <div class="mb-3">
                            <label for="kuota_lowongan" class="form-label fw-bold">Kuota Lowongan</label>
                            <input required type="number" class="form-control" id="kuota_lowongan" name="kuota_lowongan"
                                placeholder="Jumlah kuota yang dibuka" value="{{ old('kuota_lowongan', 1) }}">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="jurusan_ids" class="form-label fw-bold">Jurusan yang Relevan</label>
                            <select 
                                required 
                                multiple 
                                class="form-select select2" 
                                id="jurusan_ids" 
                                name="jurusan_ids[]" 
                                data-placeholder="Pilih Jurusan yang Relevan"
                            >
                                @foreach($jurusans as $jurusan)
                                    <option value="{{ $jurusan->id }}" {{ in_array($jurusan->id, old('jurusan_ids', [])) ? 'selected' : '' }}>
                                        {{ $jurusan->nama_jurusan }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="tipe_pekerjaan" class="form-label fw-bold">Tipe Pekerjaan</label>
                            <select required class="form-select" id="tipe_pekerjaan" name="tipe_pekerjaan">
                                <option value="" disabled selected>-- Pilih Tipe --</option>
                                <option value="Onsite" {{ old('tipe_pekerjaan') == 'Onsite' ? 'selected' : '' }}>Onsite</option>
                                <option value="Remote" {{ old('tipe_pekerjaan') == 'Remote' ? 'selected' : '' }}>Remote</option>
                                <option value="Hybrid" {{ old('tipe_pekerjaan') == 'Hybrid' ? 'selected' : '' }}>Hybrid</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="durasi" class="form-label fw-bold">Durasi (Cth: 3 Bulan)</label>
                            <input type="text" class="form-control" id="durasi" name="durasi"
                                placeholder="Cth: 3 Bulan" value="{{ old('durasi') }}">
                        </div>

                        <div class="mb-3">
                            <label for="tanggal_buka" class="form-label fw-bold">Tanggal Buka</label>
                            <input type="date" class="form-control" id="tanggal_buka" name="tanggal_buka"
                                value="{{ old('tanggal_buka') }}">
                        </div>

                        <div class="mb-3">
                            <label for="tanggal_tutup" class="form-label fw-bold">Tanggal Penutupan</label>
                            <input type="date" class="form-control" id="tanggal_tutup" name="tanggal_tutup"
                                value="{{ old('tanggal_tutup') }}">
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="deskripsi" class="form-label fw-bold">Deskripsi Lowongan</label>
                    <textarea class="form-control" id="deskripsi" name="deskripsi" rows="5"
                        placeholder="Masukkan deskripsi detail lowongan">{{ old('deskripsi') }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="kualifikasi" class="form-label fw-bold">Kualifikasi / Persyaratan</label>
                    <textarea class="form-control" id="kualifikasi" name="kualifikasi" rows="5"
                        placeholder="Masukkan poin-poin kualifikasi">{{ old('kualifikasi') }}</textarea>
                </div>

                <hr>
                <input type="submit" value="Simpan Lowongan" class="btn btn-primary">
            </form>
        </div>
    </div>
@endsection

@push('scripts')
<script>
    $(document).ready(function() {
        $('.select2').select2({
            placeholder: $(this).data('placeholder') || 'Pilih opsi',
            allowClear: true
        });
    });
</script>
@endpush