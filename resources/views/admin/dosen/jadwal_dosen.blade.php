@extends('master_admin')
@section('konten')
<div class="page-breadcrumb d-flex d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-1">Jadwal Dosen</div>
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
            <div class="card-body table-responsive">
                <table class="table mb-0">
                    <thead>
                        <tr>
                            <th width="40">No.</th>
                            <th>Nama Dosen</th>
                            <th>Mata Kuliah</th>
                            <th>SKS</th>
                            <th>Kelas</th>
                            <th>Ruangan</th>
                            <th>Jam</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($jadwal as $no => $k)
                            @php
                                $id = $k->id_kelas;
                            @endphp
                            <tr>
                                <td>{{ $no+1 }}</td>
                                <td>{{ $k->nama_dosen }}</td>
                                <td>{{ $k->nama_mapel }}</td>
                                <td>{{ $k->sks }}</td>
                                <td>{{ $k->nama_kelas }}</td>
                                <td>{{ $k->nama_ruangan }}</td>
                                <td>{{ $k->jam_mulai }} - {{ $k->jam_selesai }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
