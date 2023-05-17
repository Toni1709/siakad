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
    <div class="col-xl-12 mx-auto">
        <div class="card border-top border-0 border-4 border-white">
            <div class="card-body">
                <div class="border p-4 rounded">
                    <div class="row">
                        <div class="col-sm-3 mx-auto text-center">
                            <p>X</p>
                            <small>
                                @if ($verifikasi)
                                    @if ($verifikasi->ta != null)
                                        <button class="btn btn-sm btn-success">
                                            Tugas Akhir
                                        </button>
                                    @else
                                    <button class="btn btn-sm btn-danger">
                                        Upload Tugas Akhir
                                    </button>
                                    @endif
                                @else
                                    <button class="btn btn-sm btn-danger">
                                        Upload Tugas Akhir
                                    </button>
                                @endif
                            </small>
                        </div>
                        <div class="col-sm-3 mx-auto text-center">
                            <p>X</p>
                            <small>
                                @if ($verifikasi)
                                    @if ($verifikasi->ver_pembimbing != null)
                                        <button class="btn btn-sm btn-success">
                                            Diverifikasi Pembimbing
                                        </button>
                                    @else
                                        <button class="btn btn-sm btn-danger">
                                            Verifikasi Pembimbing
                                        </button>
                                    @endif
                                @else
                                    <button class="btn btn-sm btn-danger">
                                        Verifikasi Pembimbing
                                    </button>
                                @endif
                            </small>
                        </div>
                        <div class="col-sm-3 mx-auto text-center">
                            <p>X</p>
                            <small>
                                @if ($verifikasi)
                                    @if ($verifikasi->ver_prodi)
                                        <button class="btn btn-sm btn-success">
                                            Diverifikasi Prodi
                                        </button>
                                    @else
                                        <button class="btn btn-sm btn-danger">
                                            Verifikasi Prodi
                                        </button>
                                    @endif
                                @else
                                    <button class="btn btn-sm btn-danger">
                                        Verifikasi Prodi
                                    </button>
                                @endif
                            </small>
                        </div>
                        <div class="col-sm-3 mx-auto text-center">
                            <p>X</p>
                            <small>
                                @if ($verifikasi)
                                    @if ($verifikasi->ver_wadir)
                                        <button class="btn btn-sm btn-success">
                                            Diverifikasi Wadir
                                        </button>
                                    @else
                                        <button class="btn btn-sm btn-danger">
                                            Verifikasi Wadir
                                        </button>
                                    @endif
                                @else
                                    <button class="btn btn-sm btn-danger">
                                        Verifikasi Wadir
                                    </button>
                                @endif
                            </small>
                        </div>
                    </div>
                </div>
                <form action="/ta/verifikasi_sidang/ajukan" method="post" enctype="multipart/form-data">
                    @csrf
                    @if ($judul)
                        @if ($judul->status_ta == 'ACC')
                            <input type="hidden" name="mahasiswa" value="{{ $data->id }}">
                            <input type="hidden" name="ta" value="{{ $ta->id_ta }}">
                        @endif
                    @endif
                    <div class="row mt-3">
                        <div class="col-sm-12 mx-auto">
                            <table class="table table-bordered mb-0">
                                <thead>
                                    <tr>
                                        <td>No.</td>
                                        <td colspan="3">Verisikasi Sidang</td>
                                        <td>Ket</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Upload File Tugas Akhir </td>
                                        <td></td>
                                        <td><input type="file" name="file_ta" class="form-control"></td>
                                        <td><input type="checkbox" name=""></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-sm-12" align="center">
                            @if ($tagihan->tagihan <= 0)
                                @if ($daftar_sidang)
                                    <button type="submit" class="btn btn-sm btn-light">Ajukan Verifikasi</button>
                                    <button class="btn btn-sm btn-light">Cetak</button>
                                @else
                                    <button type="submit" class="btn disabled btn-sm btn-light">Ajukan Verifikasi</button>
                                    <button class="btn btn-sm disabled btn-light">Cetak</button>
                                @endif
                            @else
                                <button type="submit" class="btn disabled btn-sm btn-light">Ajukan Verifikasi</button>
                                <button class="btn btn-sm disabled btn-light">Cetak</button>
                            @endif
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
