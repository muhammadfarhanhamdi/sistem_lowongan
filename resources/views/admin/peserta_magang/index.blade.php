@extends('layouts.app')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4 ">
    <div>
        <ol class="breadcrumb fs-sm mb-1 ">
            <li class="breadcrumb-item">Manajemen Peserta</li>
            <li class="breadcrumb-item active" aria-current="page">Daftar Peserta Magang</li>
        </ol>
        <h4 class="main-title mb-0">Daftar Peserta Magang</h4>
    </div>
    <div>
        <a href="{{ route('admin.peserta_magang.add') }}" class="btn btn-success">
            <i class="ri-pencil-line"></i> Tambah Peserta
        </a>
    </div>
</div>

<div class="card ">
    <div class="card-body">
        <div class="table-responsive">
            <table id="datatable" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th scope="col" class="p-1 text-center" style="width: 5%;">No</th>
                        <th scope="col" class="p-1 text-center" style="width: 20%;">Nama Peserta</th>
                        <th scope="col" class="p-1 text-center" style="width: 15%;">Institusi</th>
                        <th scope="col" class="p-1 text-center" style="width: 15%;">NIM/NPM</th>
                        <th scope="col" class="p-1 text-center" style="width: 15%;">Mulai Magang</th>
                        <th scope="col" class="p-1 text-center" style="width: 15%;">Selesai Magang</th>
                        <th scope="col" class="p-1 text-center" style="width: 15%;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pesertas as $peserta)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td>{{ $peserta->user->name ?? 'N/A' }}</td>
                            <td>{{ $peserta->asal_institusi }}</td>
                            <td>{{ $peserta->nim ?? '-' }}</td>
                            <td class="text-center">{{ $peserta->tanggal_mulai_magang ?? '-' }}</td>
                            <td class="text-center">{{ $peserta->tanggal_selesai_magang ?? '-' }}</td>
                            <td class="text-center">
                                <a href="{{ route('admin.peserta_magang.edit', $peserta->id) }}" class="btn btn-primary
">
                                    <i class="ri-edit-2-line"></i> Edit
                                </a>
                                <form action="{{ route('admin.peserta_magang.destroy', $peserta->id) }}" method="POST"
style="display: inline-block" class="form-hapus">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-danger btn-hapus">
                                        <i class="ri-delete-bin-line"></i> Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    $(document).ready(function() {
        $('.btn-hapus').on('click', function(e) {
            e.preventDefault();
            let form = $(this).closest('form');
            Swal.fire({
                title: 'Yakin ingin menghapus?',
                text: 'Data yang dihapus tidak dapat dikembalikan!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        });
    });
</script>
@endpush