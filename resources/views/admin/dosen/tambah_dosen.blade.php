@extends('master_admin')
@section('konten')
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
            <form action="dosen/tambah" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card card-default">
                    <div class="card-header">
                        <h4 class="page-title">Tambah Dosen</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group">
                                    <label for="">NIP</label>
                                    <input type="text" name="nip" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="">NIK</label>
                                    <input type="text" name="nik" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="">Nama Lengkap</label>
                                    <input type="text" name="nama" class="form-control">
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Tempat Lahir</label>
                                            <input type="text" name="tempat_lahir" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Tanggal Lahir</label>
                                            <input type="date" name="tgl_lahir" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="">No. Telp</label>
                                    <input type="text" name="no_telp" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="">Jenis kelamin</label><br>
                                    <input class="form-check-input" type="radio" name="jk" value="Laki-Laki">Laki-Laki
                                    <br>
                                    <input class="form-check-input" type="radio" name="jk" value="Perempuan">Perempuan
                                </div>
                                <div class="form-group">
                                    <label for="">Email</label>
                                    <input type="text" name="email" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="">Posis</label>
                                    <input type="text" name="posisi" class="form-control">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group">
                                    <label for="">Status Kepegawaian</label>
                                    <select name="status" id="" class="form-control">
                                        <option>Tetap</option>
                                        <option>Kontrak</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Agama</label>
                                    <select name="agama" id="" class="form-control">
                                        <option>Islam</option>
                                        <option>Kristen</option>
                                        <option>Hindu</option>
                                        <option>Buddha</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Provinsi</label>
                                    <input type="text" name="prov" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="">Kabupaten</label>
                                    <input type="text" name="kab" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="">Kecamatan</label>
                                    <input type="text" name="kec" class="form-control">
                                </div>
                                <div class="row">
                                    <div class="col-md-9">
                                        <div class="form-group">
                                            <label for="">Kelurahan/Desa</label>
                                            <input type="text" name="kelurahan" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Kode POS</label>
                                            <input type="text" name="kode_pos" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="">Alamat</label>
                                    <textarea name="alamat" id="" rows="5" class="form-control"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-6">
                                <a href="/dosen" class="btn btn-light">Kembali</a>
                            </div>
                            <div class="col-6" style="text-align: right;">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
@endsection
