@extends('layouts.app')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4 ">
    <div>
        <ol class="breadcrumb fs-sm mb-1 ">
            <li class="breadcrumb-item">Manajemen Lowongan</li>
            <li class="breadcrumb-item active" aria-current="page">Daftar Lowongan</li>
        </ol>
        <h4 class="main-title mb-0">Daftar Lowongan</h4>
    </div>
    <div>
        <a href="{{ route('admin.lowongan.add') }}" class="btn btn-success">
            <i class="ri-pencil-line"></i> Tambah Lowongan
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
                        <th scope="col" class="p-1 text-center" style="width: 25%;">Judul & Posisi</th>
                        <th scope="col" class="p-1 text-center" style="width: 20%;">Satuan Kerja</th>
                        <th scope="col" class="p-1 text-center" style="width: 10%;">Kuota</th>
                        <th scope="col" class="p-1 text-center" style="width: 10%;">Tipe</th>
                        <th scope="col" class="p-1 text-center" style="width: 15%;">Penutupan</th>
                        <th scope="col" class="p-1 text-center" style="width: 15%;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($lowongans as $lowongan)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td>
                                <b>{{ $lowongan->judul_lowongan }}</b>
                                <br>
                                <span class="badge bg-primary">{{ $lowongan->kategori->nama_kategori ?? 'N/A' }}</span>
                            </td>
                            <td>{{ $lowongan->satuanKerja->nama_satuan ?? 'N/A' }}</td>
                            <td class="text-center">{{ $lowongan->kuota_lowongan }}</td>
                            <td class="text-center">{{ $lowongan->tipe_pekerjaan }}</td>
                            <td class="text-center">
                                @if($lowongan->tanggal_tutup)
                                    {{ \Carbon\Carbon::parse($lowongan->tanggal_tutup)->format('d M Y') }}
                                @else
                                    Terbuka
                                @endif
                            </td>
                            <td class="text-center">
                                <a href="{{ route('admin.lowongan.edit', $lowongan->id) }}" class="btn btn-primary">
                                    <i class="ri-edit-2-line"></i> Edit
                                </a>
                                <form action="{{ route('admin.lowongan.destroy', $lowongan->id) }}" method="POST"
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