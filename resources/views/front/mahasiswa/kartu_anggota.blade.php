@extends('front.master_mahasiswa')
@section('content')
<div class="page-breadcrumb d-flex d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-1">Perpustaakaan</div>
    <div class="ps-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
                <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Kartu Anggota</li>
            </ol>
        </nav>
    </div>
</div>
<hr>
<div class="row">
    <div class="col-xl-7 mx-auto">
        <div class="card border-top border-0 border-4 border-white">
            <div class="card-body">
                <div class="border p-4 rounded">
                    <div class="card-title d-flex align-items-center">
                        <div class="row">
                            <div class="col-lg-2">
                                <img src="https://plb.ac.id/new/wp-content/uploads/2022/01/logo-Politeknik-LP3I.png" alt="" style="width: 100%;">
                            </div>
                            <div class="col-lg-9 text-center">
                                <h5>Politeknik LP3I Kampus Padang</h5>
                                <span>Jl. ByPass Km. 7, Pisang, Kec. Pauh, Kota Padang</span>
                            </div>
                        </div>
                    </div>
                    <hr/>
                    <div class="row">
                        <div class="col-lg-4">
                            <img src="{{ asset('berkas/profil/'.$data->foto) }}" alt="" style="width:100%;">
                        </div>
                        <div class="col-lg-8">
                            <table class="mt-auto">
                                <tr>
                                    <td width="130">No. Anggota</td>
                                    <td>:</td>
                                    <td>{{ $data->id_anggota }}</td>
                                </tr>
                                <tr>
                                    <td>NIM</td>
                                    <td>:</td>
                                    <td>{{ $data->nim }}</td>
                                </tr>
                                <tr>
                                    <td>Nama Mahasiswa</td>
                                    <td>:</td>
                                    <td>{{ $data->nama_mahasiswa }}</td>
                                </tr>
                                <tr>
                                    <td>Kelas</td>
                                    <td>:</td>
                                    <td>{{ $data->nama_kelas }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
