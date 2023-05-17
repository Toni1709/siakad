@extends('front.master_mahasiswa')
@section('content')
<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-3">Home</div>
    <div class="ps-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
                <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Track Record</li>
            </ol>
        </nav>
    </div>
</div>
<!--end breadcrumb-->
<div class="container">
    <div class="main-body">
        <div class="row">
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex flex-column align-items-center text-center">
                            @if ($profil->foto)
                            <img src="{{ asset('berkas/profil/'.$profil->foto) }}" alt="Admin" class="rounded-circle p-1 bg-primary" width="110">
                            @else
                                <img src="{{ asset('backend/images/avatars/avatar-2.png') }}" alt="Admin" class="rounded-circle p-1 bg-primary" width="110">
                            @endif
                            <div class="mt-3">
                                <h4>{{ Auth::user()->nama_mahasiswa }}</h4>
                                <p class="mb-1">{{ Auth::user()->nim }}</p>
                            </div>
                        </div>
                        <hr class="my-4" />
                        <div class="mt-3">
                            <p class="text-center">
                                <strong>{{ $profil->nama_prodi }}</strong>
                                <br>
                                <span>{{ $profil->nama_konsentrasi }}</span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item" role="presentation">
                                <a class="nav-link active" data-bs-toggle="tab" href="#primaryhome" role="tab" aria-selected="true">
                                    <div class="d-flex align-items-center">
                                        <div class="tab-icon"><i class='bx bx-home font-18 me-1'></i>
                                        </div>
                                        <div class="tab-title">Akademik</div>
                                    </div>
                                </a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" data-bs-toggle="tab" href="#primaryprofile" role="tab" aria-selected="false">
                                    <div class="d-flex align-items-center">
                                        <div class="tab-icon"><i class='bx bx-user-pin font-18 me-1'></i>
                                        </div>
                                        <div class="tab-title">Kompetisi</div>
                                    </div>
                                </a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" data-bs-toggle="tab" href="#primarycontact" role="tab" aria-selected="false">
                                    <div class="d-flex align-items-center">
                                        <div class="tab-icon"><i class='bx bx-microphone font-18 me-1'></i>
                                        </div>
                                        <div class="tab-title">Pemantapan & Seminar</div>
                                    </div>
                                </a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" data-bs-toggle="tab" href="#primarycontact2" role="tab" aria-selected="false">
                                    <div class="d-flex align-items-center">
                                        <div class="tab-icon"><i class='bx bx-microphone font-18 me-1'></i>
                                        </div>
                                        <div class="tab-title">Magang & Kerja</div>
                                    </div>
                                </a>
                            </li>
                        </ul>
                        <div class="tab-content py-3">
                            <div class="tab-pane fade show active" id="primaryhome" role="tabpanel">
                                <div class="">
                                    <table class="table table-hover table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Semester</th>
                                                <th>IPK</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($ipk as $semester => $item)
                                                <tr>
                                                    <td>{{ $semester }}</td>
                                                    <td>{{ $item['nilai'] }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="primaryprofile" role="tabpanel">
                                <div class="table-responsive">
                                    <table class="table table-hover table-bordered">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Nama Kompetisi</th>
                                                <th>Nama LSP</th>
                                                <th>Status</th>
                                                <th>No. Sertifikat</th>
                                                <th>Nilai</th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="primarycontact" role="tabpanel">
                                <div class="table-responsive">
                                    <table class="table table-hover table-bordered">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Kegiatan</th>
                                                <th>Tanggal</th>
                                                <th>Semester</th>
                                                <th>Nilai</th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="primarycontact2" role="tabpanel">
                                <div class="table-responsive">
                                    <table class="table table-hover table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Tanggal Proses</th>
                                                <th>Penempatan</th>
                                                <th>Perusahaan</th>
                                                <th>Tanggal Mulai</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($magang_kerja as $mk)
                                                <tr>
                                                    <td>{{ $mk->tgl_proses }}</td>
                                                    <td>{{ $mk->penempatan }}</td>
                                                    <td>{{ $mk->nama_perusahaan }}</td>
                                                    <td>{{ $mk->tgl_mulai }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
