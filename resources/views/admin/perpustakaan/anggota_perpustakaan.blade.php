@extends('master_admin')
@section('konten')
<div class="page-breadcrumb d-flex d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-1">Anggota Perpustakaan</div>
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
                <a href="keanggotaan/form" class="btn btn-sm btn-light mb-3 mb-lg-0">
                    <i class='bx bxs-plus-square'></i>
                    New
                </a>
            </div>
            <div class="card-body table-responsive">
                <table class="table mb-0">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>NIM</th>
                            <th>Nama Mahasiswa</th>
                            <th>Kelas</th>
                            <th>Tanggal Daftar</th>
                            <th width="200">Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($anggota as $no => $a)
                            @php
                                $id = $a->id_anggota;
                            @endphp
                            <tr>
                                <td>{{ $no+1 }}</td>
                                <td>{{ $a->nim }}</td>
                                <td>{{ $a->nama_mahasiswa }}</td>
                                <td>{{ $a->nama_kelas }}</td>
                                <td>{{ $a->tgl_daftar }}</td>
                                <td>
                                    <a href="/keanggotaan/formedit/{{ $id }}" class="btn btn-sm btn-primary">Update</a>
                                    <a href="/keanggotaan/hapus/{{ $id }}" class="btn btn-sm btn-danger">Delete</a>
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
