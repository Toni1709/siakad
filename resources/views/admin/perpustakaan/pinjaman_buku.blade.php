@extends('master_admin')
@section('konten')
<div class="page-breadcrumb d-flex d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-1">Pinjaman Buku</div>
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
                <a href="pinjaman/form" class="btn btn-sm btn-light mb-3 mb-lg-0">
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
                            <th>Judul Buku</th>
                            <th>Tanggal Pinjam</th>
                            <th>Tanggal Jatuh Tempo</th>
                            <th>Tanggal Pengembalian</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pinjaman as $no => $p)
                            @php
                                $id = $p->id_pinjaman;
                            @endphp
                            <tr>
                                <td>{{ $no+1 }}</td>
                                <td>{{ $p->nim }}</td>
                                <td>{{ $p->nama_mahasiswa }}</td>
                                <td>{{ $p->nama_kelas }}</td>
                                <td>{{ $p->judul_buku }}</td>
                                <td>{{ $p->tgl_pinjam }}</td>
                                <td>{{ $p->tgl_jatuh_tempo }}</td>
                                <td>{{ $p->tgl_pengembalian }}</td>
                                <td>
                                    @if ($p->status_pengembalian == 'Belum Dikembalikan')
                                        <a href="/pinjaman/selesai/{{ $id }}" class="btn  m-1 btn-sm btn-danger">Selesai</a>
                                    @endif
                                    <a href="/pinjaman/form/edit/{{ $id }}" class="btn m-1 btn-sm btn-warning">Update</a>
                                    <a href="/pinjaman/hapus/{{ $id }}" class="btn btn-sm m-1 btn-danger">Delete</a>
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
