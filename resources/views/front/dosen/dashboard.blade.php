@extends('front.master_dosen')
@section('content')
<div class="page-breadcrumb d-flex d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-1">Tables</div>
    <div class="ps-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
                <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Basic Table</li>
            </ol>
        </nav>
    </div>
</div>
<div class="row">
    <div class="col-xl-12 mx-auto">
        <h6 class="mb-0 text-uppercase">Basic Table</h6>
        <hr/>
        <div class="card">
            <div class="card-body table-responsive">
                <table class="table mb-0">
                    <thead>
                        <tr>
                            <th class="border-top-0">No</th>
                            <th class="border-top-0">Hari</th>
                            <th class="border-top-0">Jam</th>
                            <th class="border-top-0">Mata Kuliah</th>
                            <th class="border-top-0">Kelas</th>
                            <th class="border-top-0">SKS</th>
                            <th class="border-top-0">Dosen</th>
                            <th class="border-top-0">Ruang</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($jadwal as $no => $j)
                            <tr>
                                <td>{{ $no+1 }}</td>
                                <td>{{ $j->hari }}</td>
                                <td>{{ $j->jam_mulai }} - {{ $j->jam_selesai }}</td>
                                <td>{{ $j->nama_mapel }}</td>
                                <td>{{ $j->nama_kelas }}</td>
                                <td>{{ $j->sks }}</td>
                                <td>{{ $j->nama_dosen }}</td>
                                <td>{{ $j->nama_ruangan }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
