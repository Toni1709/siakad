@extends('front.master_mahasiswa')
@section('content')
<div class="page-breadcrumb d-flex d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-1">Biaya Non Pendidikan</div>
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
            <div class="card-body">
                <table class="table mb-0" id="example2">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Tanggal</th>
                            <th>Jumlah Bayar</th>
                            <th>Jenis</th>
                            <th>Keterangan</th>
                            <th>No. Bukti</th>
                            <th>Kasir</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($biaya as $no => $b)
                            <tr>
                                <td>{{ $no+1 }}</td>
                                <td>{{ $b->tgl_pembayaran }}</td>
                                <td>{{ $b->jml_bayar }}</td>
                                <td>{{ $b->jenis }}</td>
                                <td>{{ $b->keterangan }}</td>
                                <td>{{ $b->no_bukti }}</td>
                                <td>{{ $b->kasir }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
