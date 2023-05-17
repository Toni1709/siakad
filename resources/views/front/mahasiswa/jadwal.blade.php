@extends('front.master_mahasiswa')
@section('content')
<div class="page-breadcrumb d-flex d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-1">Home</div>
    <div class="ps-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
                <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Jadwal</li>
            </ol>
        </nav>
    </div>
</div>
<div class="row row-cols-1 row-cols-md-1 row-cols-lg-12 row-cols-xl-12">
    <div class="col">
        {{-- <h6 class="mb-0 text-uppercase">Primary Nav Tabs</h6> --}}
        <hr/>
        <div class="card">
            <div class="card-body">
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active" data-bs-toggle="tab" href="#primaryhome" role="tab" aria-selected="true">
                            <div class="d-flex align-items-center">
                                <div class="tab-icon"><i class='bx bx-home font-18 me-1'></i>
                                </div>
                                <div class="tab-title">Current</div>
                            </div>
                        </a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" data-bs-toggle="tab" href="#primaryprofile" role="tab" aria-selected="false">
                            <div class="d-flex align-items-center">
                                <div class="tab-icon"><i class='bx bx-user-pin font-18 me-1'></i>
                                </div>
                                <div class="tab-title">History</div>
                            </div>
                        </a>
                    </li>
                </ul>
                <div class="tab-content py-3">
                    <div class="tab-pane fade show active" id="primaryhome" role="tabpanel">
                        <div class="table-responsive">
                            <table class="table table-hover table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Hari</th>
                                        <th>Jam</th>
                                        <th>Matakuliah</th>
                                        <th>Ruang</th>
                                        <th>SKS</th>
                                        <th>Smt</th>
                                        <th>Dosen</th>
                                        <th>Kelas</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $sks = 0;
                                    @endphp
                                    @foreach ($jadwal as $no => $j)
                                        @php
                                            $sks += $j->sks;
                                        @endphp
                                        <tr>
                                            <td>{{ $no+1 }}</td>
                                            <td>{{ $j->hari }}</td>
                                            <td>{{ $j->jam_mulai }} - {{ $j->jam_selesai }}</td>
                                            <td>{{ $j->nama_mapel }}</td>
                                            <td>{{ $j->nama_ruangan }}</td>
                                            <td>{{ $j->sks }}</td>
                                            <td>{{ $j->semester }}</td>
                                            <td>{{ $j->nama_dosen }}</td>
                                            <td>{{ $j->nama_kelas }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th colspan="5">Total SKS</th>
                                        <th>{{ $sks }}</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="primaryprofile" role="tabpanel">
                        <div class="table-responsive">
                            <table class="table table-hover table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Hari</th>
                                        <th>Jam</th>
                                        <th>Matakuliah</th>
                                        <th>Ruang</th>
                                        <th>SKS</th>
                                        <th>Smt</th>
                                        <th>Dosen</th>
                                        <th>Kelas</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $sks = 0;
                                    @endphp
                                    @foreach ($jadwalall as $no => $j)
                                        @php
                                            $sks += $j->sks;
                                        @endphp
                                        <tr>
                                            <td>{{ $no+1 }}</td>
                                            <td>{{ $j->hari }}</td>
                                            <td>{{ $j->jam_mulai }} - {{ $j->jam_selesai }}</td>
                                            <td>{{ $j->nama_mapel }}</td>
                                            <td>{{ $j->nama_ruangan }}</td>
                                            <td>{{ $j->sks }}</td>
                                            <td>{{ $j->semester }}</td>
                                            <td>{{ $j->nama_dosen }}</td>
                                            <td>{{ $j->nama_kelas }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th colspan="5">Total SKS</th>
                                        <th>{{ $sks }}</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
