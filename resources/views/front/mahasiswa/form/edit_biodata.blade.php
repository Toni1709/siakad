@extends('front.master_mahasiswa')
@section('content')
    <!--breadcrumb-->
    <div class="page-breadcrumb d-flex d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-1">Biodata</div>
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
    <!--end breadcrumb-->
    <div class="container-fluid">
        <div class="main-body">
            <div class="row">
                <div class="col-lg-12">
                    <form action="/biodata/edit" method="post">
                        @csrf
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="row mb-3">
                                            <div class="col-sm-6">
                                                <h6 class="mb-1">NIK</h6>
                                                <input type="text" name="nik" value="{{ $biodata->nik }}" class="form-control">
                                                <input type="hidden" name="id" value="{{ $biodata->id }}">
                                            </div>
                                            <div class="col-sm-6">
                                                <h6 class="mb-1">NIM</h6>
                                                <input type="text" name="nim" value="{{ $biodata->nim }}" readonly class="form-control">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-sm-12">
                                                <h6 class="mb-1">Nama</h6>
                                                <input type="text" name="nama" value="{{ $biodata->nama_mahasiswa }}" class="form-control">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-sm-8">
                                                <h6 class="mb-1">Tempat Lahir</h6>
                                                <input type="text" name="tempat_lahir" value="{{ $biodata->tempat_lahir }}" class="form-control">
                                            </div>
                                            <div class="col-sm-4">
                                                <h6 class="mb-1">Tanggal Lahir</h6>
                                                <input type="date" name="tgl_lahir" value="{{ $biodata->tgl_lahir }}" class="form-control">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-sm-4">
                                                <h6 class="mb-1">Provinsi</h6>
                                                <input type="text" name="provinsi" value="{{ $biodata->provinsi }}" class="form-control">
                                            </div>
                                            <div class="col-sm-4">
                                                <h6 class="mb-1">Kabupaten</h6>
                                                <input type="text" name="kabupaten" value="{{ $biodata->kabupaten }}" class="form-control">
                                            </div>
                                            <div class="col-sm-4">
                                                <h6 class="mb-1">Kecamatan</h6>
                                                <input type="text" name="kecamatan" value="{{ $biodata->kecamatan }}" class="form-control">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-sm-6">
                                                <h6 class="mb-1">No. Hp</h6>
                                                <input type="text" name="no_hp" value="{{ $biodata->no_hp }}" class="form-control">
                                            </div>
                                            <div class="col-sm-6">
                                                <h6 class="mb-1">No. Telp</h6>
                                                <input type="text" name="no_telp" value="{{ $biodata->no_telp }}" class="form-control">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-sm-12">
                                                <h6 class="mb-1">Alamat</h6>
                                                <textarea name="alamat" rows="4" class="form-control">{{ $biodata->alamat }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row mb-3">
                                            <div class="col-sm-12">
                                                <h6 class="mb-1">Email Pribadi</h6>
                                                <input type="email" name="email" value="{{ $biodata->email }}" class="form-control">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-sm-6">
                                                <h6 class="mb-1">Asal Sekolah</h6>
                                                <input type="text" name="asal_sekolah" value="{{ $biodata->asal_sekolah }}" class="form-control">
                                            </div>
                                            <div class="col-sm-6">
                                                <h6 class="mb-1">Jurusan</h6>
                                                <input type="text" name="jurusan" value="{{ $biodata->jurusan }}" class="form-control">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-sm-6">
                                                <h6 class="mb-1">Nama Ibu</h6>
                                                <input type="text" name="nama_ibu" value="{{ $biodata->nama_ibu }}" class="form-control">
                                            </div>
                                            <div class="col-sm-6">
                                                <h6 class="mb-1">Nama Ayah</h6>
                                                <input type="text" name="nama_ayah" value="{{ $biodata->nama_ayah }}" class="form-control">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-sm-6">
                                                <h6 class="mb-1">Telp. Orang Tua</h6>
                                                <input type="text" name="telp_ortu" value="{{ $biodata->telp_ortu }}" class="form-control">
                                            </div>
                                            <div class="col-sm-6">
                                                <h6 class="mb-1">No. VA</h6>
                                                <input type="text" name="no_va" value="{{ $biodata->no_va }}" readonly class="form-control">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-sm-4">
                                                <h6 class="mb-1">Jenis Kelamin</h6>
                                                <input type="text" name="jk" value="{{ $biodata->jk }}" class="form-control">
                                            </div>
                                            <div class="col-sm-4">
                                                <h6 class="mb-1">Agama</h6>
                                                <input type="text" name="agama" value="{{ $biodata->agama }}" class="form-control">
                                            </div>
                                            <div class="col-sm-4">
                                                <h6 class="mb-1">Golongan Darah</h6>
                                                <input type="text" name="gol_darah" value="{{ $biodata->gol_darah }}" class="form-control">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-sm-6">
                                                <h6 class="mb-1">Status Menikah</h6>
                                                <input type="text" name="status_kawin" value="{{ $biodata->status_kawin }}" class="form-control">
                                            </div>
                                            <div class="col-sm-6">
                                                <h6 class="mb-1">Kewarganegaraan</h6>
                                                <input type="text" name="warga_negara" value="{{ $biodata->warga_negara }}" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="persetujuan">
                                            <label class="form-check-label" for="flexCheckDefault">
                                                Saya mengerti dan bertanggung jawab atas perubahan data saya.
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <a href="/biodata" class="btn btn-sm btn-light mb-3 mb-lg-0">
                                            Kembali
                                        </a>
                                    </div>
                                    <div class="col-sm-6" align="right">
                                        <button type="submit" class="btn btn-sm btn-light mb-3 mb-lg-0">
                                            Save Changes
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- Modal Edit Password --}}
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="/biodata/edit/password" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="row g-3">
                            <div class="col-lg-12 col-md-12">
                                <label for="">Password Lama</label>
                                <input type="text" name="lama" class="form-control">
                            </div>
                            <div class="col-lg-12 col-md-12">
                                <label for="">Password Baru</label>
                                <input type="text" name="baru" class="form-control">
                            </div>
                            <div class="col-lg-12 col-md-12">
                                <label for="">Konfirmasi Password Baru</label>
                                <input type="text" name="konfirmasi" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- Modal Perbarui Foto --}}
    <div class="modal fade" id="perbaruifoto" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="/biodata/edit/foto" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="row g-3">
                            <div class="col-lg-12 col-md-12">
                                <label for="">Foto</label>
                                <input type="file" name="foto" class="form-control">
                                <sup>*Foto harus png,jpg,jpeg</sup>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
