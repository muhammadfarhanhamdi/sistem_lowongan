@extends('layouts.app')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div>
            <ol class="breadcrumb fs-sm mb-1">
                <li class="breadcrumb-item">Manajemen Pengguna</li>
                <li class="breadcrumb-item"><a href="{{ route('admin.user.index') }}">Daftar User</a></li>
            </ol>
            <h4 class="main-title mb-0">Tambah User</h4>
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
                <form action="{{ route('admin.user.store') }}" method="POST">
                    @csrf
                    @method('POST')

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="name" class="form-label fw-bold">Nama Lengkap</label>
                                <input required type="text" class="form-control" id="name" name="name"
                                    placeholder="Masukan Nama Lengkap" value="{{ old('name') }}">
                            </div>

                            <div class="mb-3">
                                <label for="username" class="form-label fw-bold">Username</label>
                                <input required type="text" class="form-control" id="username" name="username"
                                    placeholder="Masukan Username" value="{{ old('username') }}">
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label fw-bold">Email</label>
                                <input required type="email" class="form-control" id="email" name="email"
                                    placeholder="Masukan Email" value="{{ old('email') }}">
                            </div>

                            <div class="mb-3">
                                <label for="id_role" class="form-label fw-bold">Role</label>
                                <select required class="form-select" id="id_role" name="id_role">
                                    <option value="" disabled selected>-- Pilih Role --</option>
                                    @foreach($roles as $role)
                                        <option value="{{ $role->id }}" data-nama-role="{{ $role->nama_role }}" {{ old('id_role') == $role->id ? 'selected' : '' }}>
                                            {{ $role->nama_role }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3" id="satuan_kerja_wrapper" style="display: none;">
                                <label for="id_satuan_kerja" class="form-label fw-bold">Satuan Kerja</label>
                                <select class="form-select" id="id_satuan_kerja" name="id_satuan_kerja">
                                    <option value="" selected>-- Pilih Satuan Kerja (Opsional) --</option>
                                    @foreach($satuanKerjas as $satuanKerja)
                                        <option value="{{ $satuanKerja->id }}" {{ old('id_satuan_kerja') == $satuanKerja->id ? 'selected' : '' }}>
                                            {{ $satuanKerja->nama_satuan }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label fw-bold">Password</label>
                                <input required type="password" class="form-control" id="password" name="password"
                                    placeholder="Masukan Password (min. 8 karakter)">
                            </div>

                            <div class="mb-3">
                                <label for="password_confirmation" class="form-label fw-bold">Konfirmasi Password</label>
                                <input required type="password" class="form-control" id="password_confirmation"
                                    name="password_confirmation" placeholder="Ulangi Password">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="telepon" class="form-label fw-bold">Telepon</label>
                                <input type="text" class="form-control" id="telepon" name="telepon"
                                    placeholder="Masukan Nomor Telepon" value="{{ old('telepon') }}">
                            </div>

                            <div class="mb-3">
                                <label for="jabatan" class="form-label fw-bold">Jabatan</label>
                                <input type="text" class="form-control" id="jabatan" name="jabatan"
                                    placeholder="Masukan Jabatan (Opsional)" value="{{ old('jabatan') }}">
                            </div>

                            <div class="mb-3">
                                <label for="alamat" class="form-label fw-bold">Alamat</label>
                                <textarea class="form-control" id="alamat" name="alamat" rows="4"
                                    placeholder="Masukan Alamat (Opsional)">{{ old('alamat') }}</textarea>
                            </div>
                        </div>
                    </div>

                    <hr>
                    <input type="submit" value="Simpan" class="btn btn-primary">
                </form>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script>
    $(document).ready(function() {
        const roleSelect = $('#id_role');
        const satuanKerjaWrapper = $('#satuan_kerja_wrapper');

        function toggleSatuanKerja(selectedRole) {
            if (selectedRole === 'satuan_kerja') {
                satuanKerjaWrapper.slideDown();
            } else {
                satuanKerjaWrapper.slideUp();
                $('#id_satuan_kerja').val('');
            }
        }

        roleSelect.on('change', function() {
            let selectedRoleName = $(this).find('option:selected').data('nama-role');
            toggleSatuanKerja(selectedRoleName);
        });

        let initialRoleName = roleSelect.find('option:selected').data('nama-role');
        toggleSatuanKerja(initialRoleName);
    });
</script>
@endpush