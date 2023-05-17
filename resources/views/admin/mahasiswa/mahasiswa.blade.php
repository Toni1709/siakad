@extends('master_admin')
@section('konten')
<div class="page-breadcrumb d-flex d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-1">Data Mahasiswa</div>
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
        <h6 class="mb-0 text-uppercase">Basic Table</h6>
        <hr/>
        <div class="card">
            <div class="card-header">
                <a href="/tambah_mahasiswa" class="btn btn-sm btn-light mb-3 mb-lg-0">
                    <i class='bx bxs-plus-square'></i>
                    New
                </a>
            </div>
            <div class="card-body table-responsive">
                <table class="table mb-0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>NIM</th>
                            <th>Nama Mahasiswa</th>
                            <th>Angkatan</th>
                            <th>Jurusan</th>
                            <th>Kelas</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($mahasiswa as $no => $m)
                        @php
                            $id = $m->id;
                        @endphp
                            <tr>
                                <td>{{ $no+1 }}</td>
                                <td><b>{{ $m->nim }}</b></td>
                                <td>{{ $m->nama_mahasiswa }}</td>
                                <td>{{ $m->angkatan }}</td>
                                <td>{{ $m->nama_konsentrasi }}</td>
                                <td>{{ $m->nama_kelas }}</td>
                                <td>
                                    <a href="/edit_mahasiswa/{{ $id }}" class="btn btn-sm btn-warning"><i class="fa-solid fa-pencil"></i></a>
                                    <a href="mahasiswa/hapus/{{ $m->id }}" class="btn btn-sm btn-danger"><i class="fa-solid fa-trash"></i></a>
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
