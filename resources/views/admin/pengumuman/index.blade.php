@extends('master_admin')
@section('konten')
<div class="page-breadcrumb d-flex d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-1">Pengumuman</div>
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
            <div class="card-header">
                <a href="/pengumuman/formtambah" class="btn btn-sm btn-light mb-3 mb-lg-0">
                    <i class='bx bxs-plus-square'></i>
                    New
                </a>
                {{-- <button type="button" class="btn btn-sm btn-light mb-3 mb-lg-0" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    <i class='bx bxs-plus-square'></i>
                    New
                </button> --}}
            </div>
            <div class="card-body table-responsive">
                <table class="table mb-0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Tanggal</th>
                            <th>Tujuan</th>
                            <th>Judul</th>
                            <th>Isi Pengumuman</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pengumuman as $no => $p)
                            @php
                                $id = $p->id_pengumuman;
                            @endphp
                            <tr>
                                <td>{{ $no+1 }}</td>
                                <td>{{ $p->tgl_pengumuman }}</td>
                                <td>{{ $p->tujuan }}</td>
                                <td>{{ $p->judul_pengumuman }}</td>
                                <td>
                                    <button type="button" class="btn btn-light btn-sm" data-bs-toggle="modal" data-bs-target="#exampleLargeModal{{ $id }}">
                                        Lihat
                                    </button>
                                </td>
                                <td>
                                    <a href="/pengumuman/formedit/{{ $id }}" class="btn btn-sm btn-warning">Update</a>
                                    <a href="/pengumuman/hapus/{{ $id }}" class="btn btn-sm btn-danger">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
{{-- Modal Isi Pengumuman --}}
@foreach ($pengumuman as $p)
    @php
        $id = $p->id_pengumuman;
    @endphp
    <div class="modal fade" id="exampleLargeModal{{ $id }}" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    {!! $p->isi_pengumuman !!}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
@endforeach
@endsection
