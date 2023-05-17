@extends('front.master_dosen');
@section('content')
<div class="container-fluid">

    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="btn-group pull-right">
                    <ol class="breadcrumb hide-phone p-0 m-0">
                        <li class="breadcrumb-item"><a href="#">Tahun : 2023</a></li>
                        <li class="breadcrumb-item"><a href="#">Bulan : 03</a></li>
                        <li class="breadcrumb-item active">Semester : 6</li>
                    </ol>
                </div>
                <h4 class="page-title">Daftar Jadwal </h4>
            </div>
        </div>
    </div>
    <!-- end page title end breadcrumb -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="mt-0 header-title">Jadwal Mengajar</h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>#</th >
                                <th>Matakuliah</th>
                                <th>Smt</th>
                                <th>Kelas</th>
                                <th>Dosen</th>
                                <th>Ruang</th>
                                <th>Jam</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($jadwal as $no => $j)
                                <tr>
                                    <th>{{ $no+1 }}</th>
                                    <th>{{ $j->nama_mapel }}</th>
                                    <th>{{ $j->semester }}</th>
                                    <th>{{ $j->nama_kelas }}</th>
                                    <th>{{ $j->nama_dosen }}</th>
                                    <th>{{ $j->nama_ruangan }}</th>
                                    <th>{{ $j->jam_mulai }} - {{ $j->jam_selesai }}</th>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div> <!-- end col -->
    </div>
</div>
@endsection
