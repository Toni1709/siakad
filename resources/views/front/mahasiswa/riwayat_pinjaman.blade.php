@extends('front.master_mahasiswa')
@section('content')
<div class="page-breadcrumb d-flex d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-1">Perpustakaan</div>
    <div class="ps-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
                <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Riwayat Pinjaman Buku</li>
            </ol>
        </nav>
    </div>
</div>
<hr>
<div class="row">
    <div class="col-xl-12 mx-auto">
        <div class="card">
            <div class="card-body">
                <table class="table mb-0" id="example2">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Jenis Buku</th>
                            <th>Judul Buku</th>
                            <th>Tanggal Pinjam</th>
                            <th>Jatuh Tempo</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($riwayat as $no => $r)
                            <tr>
                                <td>{{ $no+1 }}</td>
                                <td>{{ $r->jenis_buku }}</td>
                                <td>{{ $r->judul_buku }}</td>
                                <td>{{ $r->tgl_pinjam }}</td>
                                <td>{{ $r->tgl_jatuh_tempo }}</td>
                                <td>{{ $r->status_pengembalian }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
