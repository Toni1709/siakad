@extends('master_admin')
@section('konten')
<div class="page-breadcrumb d-flex d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-1">Data Dosen</div>
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
                <a href="/tambah_dosen" class="btn btn-sm btn-light mb-3 mb-lg-0">
                    <i class='bx bxs-plus-square'></i>
                    New
                </a>
            </div>
            <div class="card-body table-responsive">
                <table class="table mb-0">
                    <thead>
                        <tr>
                            <th width="40">No</th>
                            <th>NIP</th>
                            <th>Nama</th>
                            <th>Posisi</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dosen as $no => $d)
                            <tr>
                                <td>{{ $no+1 }}</td>
                                <td><b>{{ $d->nip }}</b></td>
                                <td>{{ $d->nama_dosen }}</td>
                                <td>{{ $d->posisi }}</td>
                                <td>
                                    <a href="/edit_mahasiswa/" class="btn btn-sm btn-warning">Update</a>
                                    <a href="/mahasiswa/hapus/" class="btn btn-sm btn-danger">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
