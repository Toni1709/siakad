@extends('front.master_mahasiswa')
@section('content')
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
    <div class="breadcrumb-title pe-1">Biaya Pendidikan</div>
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
                            <th>Jatuh Tempo</th>
                            <th>Tagihan</th>
                            <th>Tanggal Bayar</th>
                            <th>Bayar</th>
                            <th>Kewajiban</th>
                            <th>No. Bukti</th>
                            <th>Kasir</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($biaya as $no => $b)
                            <?php
                                $kewajiban = $b->tagihan - $b->bayar;
                            ?>
                            <tr>
                                <td>{{ $no+1 }}</td>
                                <td>20 {{ bln($b->bulan) }} {{ $b->tahun }}</td>
                                <td>@rp($b->tagihan)</td>
                                <td></td>
                                <td>@rp($b->bayar)</td>
                                <td>@rp($kewajiban)</td>
                                <td></td>
                                <td></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
