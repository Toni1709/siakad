@extends('master_admin')
@section('konten')
<div class="page-breadcrumb d-flex d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-1">Absensi</div>
    <div class="ps-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
                <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">View Absensi</li>
            </ol>
        </nav>
    </div>
</div>
<hr>
<div class="row">
    <div class="col-xl-12 mx-auto">
        <hr/>
        <div class="card">
            <div class="card-body table-responsive">
                <table class="table mb-0">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Mata Kuliah</th>
                            @for ($i = 1; $i <= 14; $i++)
                                <th>P{{ $i }}</th>
                            @endfor
                            <th>UTS</th>
                            <th>UAS</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($jadwal as $no => $j)
                            @php
                                $absensi = DB::table('absensi_mahasiswa')
                                    ->where('id_mapel', $j->id_mapel)
                                    ->where('id_mahasiswa', $j->id)
                                    ->get();
                            @endphp
                            <tr>
                                <td>{{ $no+1 }}</td>
                                <td>{{ $j->nama_mapel }}</td>
                                @foreach ($absensi as $no => $a)
                                    <td>{{ $a->kehadiran }}</td>
                                @endforeach
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
