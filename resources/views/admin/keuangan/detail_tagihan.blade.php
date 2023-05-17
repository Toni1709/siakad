@extends('master_admin')
@section('konten')
<?php
    function bln($tanggal){
        $bulan = array (
        1 =>   'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember'
        );
        $pecahkan = explode('-', $tanggal);
        return $bulan[(int)$pecahkan[0]];
    }
?>
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
            <div class="card-header">
                {{-- <a href="/biaya/nonpendidikan/tambah" class="btn btn-sm btn-light mb-3 mb-lg-0">
                    <i class='bx bxs-plus-square'></i>
                    New
                </a>                            --}}
            </div>
            <div class="card-body table-responsive">
                    <table class="table mb-0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Bulan</th>
                                <th>Tagihan</th>
                                <th width="150">Bayar</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tagihan as $no => $t)
                                <tr>
                                    <td>{{ $no+1 }}</td>
                                    <td>{{ bln($t->bulan) }} {{ $t->tahun }}</td>
                                    <td>{{ $t->tagihan }}</td>
                                    <td>{{ $t->bayar }}</td>
                                    <td>
                                        <button type="button" class="btn btn-sm btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $t->id_tagihan }}">
                                            Bayar
                                        </button>
                                    </td>
                                </tr>
                                <div class="modal fade" id="exampleModal{{ $t->id_tagihan }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <form action="/tagihan/bayar" method="post">
                                                @csrf
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label for="">Jumlah Bayar</label>
                                                        <input type="text" name="uang" value="{{ $t->bayar }}" class="form-control">
                                                        <input type="hidden" name="id" value="{{ $t->id_tagihan }}">
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-success">Save Changes</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </tbody>
                    </table>
            </div>
        </div>
    </div>
</div>
@endsection
