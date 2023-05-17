@extends('front.master_mahasiswa')
@section('content')
<div class="page-breadcrumb d-flex d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-1">KKI</div>
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
                        <h5 class="mb-0 text-white">Form Upload CV</h5>
                    </div>
                    <hr/>
                    <form action="/kki/cv/input" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                            <label for="inputEnterYourName" class="col-sm-3 col-form-label">NIM</label>
                            <div class="col-sm-9">
                                <input type="hidden" class="form-control" name="id" value="{{ $data->id }}">
                                <input type="hidden" class="form-control" name="id_kelas" value="{{ $data->id_kelas }}">
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
                            <label for="inputChoosePassword2" class="col-sm-3 col-form-label">File CV</label>
                            <div class="col-sm-9">
                                <input type="file" class="form-control" name="file">
                                <sup>*PDF</sup>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-3"></div>
                            <div class="col-sm-9">
                                @if ($cv->count() > 0)
                                    <button type="button" class="btn btn-sm btn-success">File Sudah Diupload</button>
                                @else
                                    <button type="button" class="btn btn-sm btn-danger">File Belum Diupload</button>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-3 col-form-label"></label>
                            <div class="col-sm-9">
                                @if ($cv->count() > 0)
                                    <button type="submit" class="btn btn-light px-5" disabled>Upload</button>
                                @else
                                    <button type="submit" class="btn btn-light px-5">Upload</button>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
