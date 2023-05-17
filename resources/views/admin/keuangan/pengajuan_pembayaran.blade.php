@extends('master_admin')
@section('konten')
<div class="page-breadcrumb d-flex d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-1">Pengajuan Pembayaran</div>
    {{-- <div class="ps-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
                <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Basic Table</li>
            </ol>
        </nav>
    </div> --}}
</div>
<hr>
<div class="row">
    <div class="col-xl-12 mx-auto">
        <div class="card">
            <div class="card-body table-responsive">
                <table class="table mb-0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Tanggal</th>
                            <th>NIM</th>
                            <th>Nama</th>
                            <th>File</th>
                            <th>Status Pengajuan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pengajuan as $no => $p)
                            <tr>
                                <td>{{ $no+1 }}</td>
                                <td>{{ $p->tgl_pengajuan }}</td>
                                <td>{{ $p->nim }}</td>
                                <td>{{ $p->nama_mahasiswa }}</td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-light mb-3 mb-lg-0" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $p->id_pengajuan }}">
                                        Lihat File
                                    </button>
                                </td>
                                <td>
                                    @if ($p->status_pengajuan == 'Disetujui')
                                        <p class="text-success">{{ $p->status_pengajuan }}</p>
                                    @elseif ($p->status_pengajuan == 'Ditolak')
                                        <p class="text-danger">{{ $p->status_pengajuan }}</p>
                                    @else
                                        <a href="/status_pengajuan/setuju/{{ $p->id_pengajuan }}" class="btn btn-sm btn-success">Setujui</a>
                                        <a href="/status_pengajuan/tolak/{{ $p->id_pengajuan }}" class="btn btn-sm btn-danger">Tolak</a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
{{-- Modal View File --}}
@foreach ($pengajuan as $p)
<div class="modal fade" id="exampleModal{{ $p->id_pengajuan }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <object data="{{ asset('file/'.$p->file) }}" type="application/pdf" style="height: 100%;"></object>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endforeach
@endsection
