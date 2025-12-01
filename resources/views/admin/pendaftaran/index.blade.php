@extends('layouts.app')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4 ">
    <div>
        <ol class="breadcrumb fs-sm mb-1 ">
            <li class="breadcrumb-item">Manajemen Lowongan</li>
            <li class="breadcrumb-item active" aria-current="page">Daftar Pendaftaran</li>
        </ol>
        <h4 class="main-title mb-0">Daftar Pendaftaran</h4>
    </div>
    <div>
        {{-- optional actions could go here --}}
    </div>
</div>

<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table id="datatable" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th scope="col" class="p-1 text-center" style="width: 5%;">No</th>
                        <th scope="col" class="p-1 text-center" style="width: 25%;">Pelamar</th>
                        <th scope="col" class="p-1 text-center" style="width: 25%;">Lowongan</th>
                        <th scope="col" class="p-1 text-center" style="width: 10%;">CV</th>
                        <th scope="col" class="p-1 text-center" style="width: 10%;">Status</th>
                        <th scope="col" class="p-1 text-center" style="width: 15%;">Tanggal</th>
                        <th scope="col" class="p-1 text-center" style="width: 10%;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pendaftaran as $p)
                        @php $peserta = optional($p->peserta); $user = optional($peserta->user); @endphp
                        <tr>
                            <td class="text-center">{{ $loop->iteration + (($pendaftaran->currentPage()-1) * $pendaftaran->perPage()) }}</td>
                            <td>
                                <b>{{ $user->name ?? ($peserta->nama_lengkap ?? ('User #' . ($peserta->id_user ?? '-'))) }}</b>
                                <br>
                                <small class="text-muted">{{ $user->email ?? '' }}</small>
                            </td>
                            <td class="text-center">{{ optional($p->lowongan)->judul_lowongan ?? '-' }}</td>
                            <td class="text-center">
                                @if(!empty($p->cv_path))
                                    <a class="btn btn-sm btn-outline-primary" href="{{ asset($p->cv_path) }}" target="_blank">Lihat</a>
                                @else
                                    -
                                @endif
                            </td>
                            <td class="text-center">
                                @php $s = strtolower((string)$p->status_penerimaan); @endphp
                                @if($s === 'menunggu')
                                    <span class="badge bg-warning text-dark">Menunggu</span>
                                @elseif($s === 'diterima' || $s === 'accepted')
                                    <span class="badge bg-success">Diterima</span>
                                @elseif($s === 'ditolak' || $s === 'rejected')
                                    <span class="badge bg-danger">Ditolak</span>
                                @else
                                    <span class="badge bg-secondary">{{ $p->status_penerimaan }}</span>
                                @endif
                            </td>
                            <td class="text-center">
                                @if($p->tanggal_daftar)
                                    {{ \Carbon\Carbon::parse($p->tanggal_daftar)->format('d M Y H:i') }}
                                @else
                                    -
                                @endif
                            </td>
                            <td class="text-center">
                                <a class="btn btn-sm btn-primary" href="{{ route('admin.pendaftaran.show', $p->id) }}">Lihat</a>
                                @if(strtolower((string)$p->status_penerimaan) === 'menunggu')
                                    <form action="{{ route('admin.pendaftaran.approve', $p->id) }}" method="POST" style="display:inline" class="confirm-form">
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-success" data-confirm="Apakah Anda yakin ingin menerima pendaftaran #{{ $p->id }}?">Terima</button>
                                    </form>
                                    <form action="{{ route('admin.pendaftaran.reject', $p->id) }}" method="POST" style="display:inline" class="confirm-form">
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-danger" data-confirm="Apakah Anda yakin ingin menolak pendaftaran #{{ $p->id }}?">Tolak</button>
                                    </form>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="mt-3">
            {{ $pendaftaran->withQueryString()->links() }}
        </div>
    </div>
</div>

@endsection

<!-- confirmation handled globally via layouts.app -->
