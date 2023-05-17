@extends('front.master_mahasiswa')
@section('content')
<div class="page-breadcrumb d-flex d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-1">Pengajuan Pembayaran</div>
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
    <div class="col-xl-9 mx-auto">
        <div class="card border-top border-0 border-4 border-white">
            <div class="card-body">
                <div class="border p-4 rounded">
                    <div class="card-title d-flex align-items-center">
                        <div><i class="bx bxs-user me-1 font-22 text-white"></i>
                        </div>
                        <h5 class="mb-0 text-white">Form Pengajuan Pembayaran</h5>
                    </div>
                    <hr/>
                    <form action="/pengajuan_pembayaran/tambah" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                            <label for="inputEnterYourName" class="col-sm-3 col-form-label">NIM</label>
                            <div class="col-sm-9">
                                <input type="hidden" class="form-control" name="id" value="{{ $data->id }}">
                                <input type="text" class="form-control" name="nim" value="{{ $data->nim }}" readonly>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputPhoneNo2" class="col-sm-3 col-form-label">Nama Lengkap</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="nama" value="{{ $data->nama_mahasiswa }}" readonly>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputEmailAddress2" class="col-sm-3 col-form-label">Program Studi</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" value="{{ $data->nama_prodi }}" readonly>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputChoosePassword2" class="col-sm-3 col-form-label">Konsentrasi</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" value="{{ $data->nama_konsentrasi }}" readonly>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputChoosePassword2" class="col-sm-3 col-form-label">File Pengajuan</label>
                            <div class="col-sm-9">
                                <input type="file" class="form-control" name="file">
                                <sup>*PDF</sup>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-3 col-form-label"></label>
                            <div class="col-sm-9">
                                <button type="submit" class="btn btn-light px-5">Ajukan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xl-9 mx-auto">
        <div class="card border-top border-0 border-4 border-white">
            <div class="card-body">
                <div class="border p-4 rounded">
                    <div class="card-title d-flex align-items-center">
                        <div><i class="bx bxs-user me-1 font-22 text-white"></i>
                        </div>
                        <h5 class="mb-0 text-white">Pengajuan Pembayaran</h5>
                    </div>
                    <hr/>
                    <div class="row">
                        <div class="">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Tanggal</th>
                                        <th>NIM</th>
                                        <th>Nama</th>
                                        <th>Status Pengajuan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($pengajuan->count() == 0)
                                        <tr>
                                            <td class="text-center">Belum Ada Pengajuan Pembayaran</td>
                                        </tr>
                                    @else
                                        @foreach ($pengajuan as $no => $p)
                                            <tr>
                                                <td>{{ $no+1 }}</td>
                                                <td>{{ $p->tgl_pengajuan }}</td>
                                                <td>{{ $p->nim }}</td>
                                                <td>{{ $p->nama_mahasiswa }}</td>
                                                <td>{{ $p->status_pengajuan }}</td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
