@extends('master_admin')
@section('konten')
    @foreach ($mahasiswa as $m)
        <div class="page-breadcrumb mb-3">
            <div class="row">
                <div class="col-5 align-self-center">
                    <h4 class="page-title">Mahasiswa</h4>
                    <div class="d-flex align-items-center">

                    </div>
                </div>
                <div class="col-7 align-self-center">
                    <div class="d-flex no-block justify-content-end align-items-center">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="">Home</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">Mahasiswa</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <section class="content">
            <div class="container-fluid">
                <form action="mahasiswa/tambah" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card card-default">
                        <div class="card-header">
                            <h3 class="card-title">Tambah Mahasiswa</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="">NIM</label>
                                        <input type="text" name="nim" value="{{ $m->nim }}" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Nama Lengkap</label>
                                        <input type="text" name="nama" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="">NIK</label>
                                        <input type="text" name="nik" class="form-control">
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
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">No. Telp</label>
                                                <input type="text" name="no_telp" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">No. Hp</label>
                                                <input type="text" name="no_hp" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Email</label>
                                                <input type="text" name="email" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Email PLB</label>
                                                <input type="text" name="email_plb" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Angkatan</label>
                                        <input type="number" name="angkatan" class="form-control">
                                    </div>
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label for="">Jurusan</label>
                                                <select name="id_konsentrasi" id="jurusan" class="form-control">
                                                    <option value="">-- Pilih Jurusan --</option>
                                                    {{-- @foreach ($jurusan as $j)
                                                        <option value="{{ $j->id_konsentrasi }}">
                                                            {{ $j->id_prodi }} - {{ $j->nama_konsentrasi }}
                                                        </option>
                                                    @endforeach --}}
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="">Kelas</label>
                                                <select name="id_kelas" id="kelas" class="form-control">
                                                    <option value="">-- Pilih Kelas --</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label for="">Asal Sekolah</label>
                                                <input type="text" name="asal_sekolah" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="">Jurusan Sekolah</label>
                                                <input type="text" name="jurusan" class="form-control">
                                            </div>
                                        </div>
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
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label>No. VA</label>
                                        <input type="text" name="no_va" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Jenis Kelamin</label>
                                        <select name="jk" id="" class="form-control">
                                            <option>Laki-Laki</option>
                                            <option>Perempuan</option>
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
                                        <label for="">Golongan Darah</label>
                                        <select name="gol_darah" id="" class="form-control">
                                            <option>A</option>
                                            <option>B</option>
                                            <option>O</option>
                                            <option>AB</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Status Menikah</label>
                                        <select name="status_kawin" id="" class="form-control">
                                            <option>Sudah Menikah</option>
                                            <option>Belum Menikah</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Warga Negara</label>
                                        <select name="warga_negara" id="" class="form-control">
                                            <option>WNI</option>
                                            <option>WNA</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Nama Ibu</label>
                                        <input type="text" name="nama_ibu" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Telp. Orang Tua</label>
                                        <input type="text" name="telp_ortu" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Alamat</label>
                                        <textarea name="alamat" id="" cols="30" rows="5" class="form-control"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Status</label><br>
                                        <input type="radio" name="status" value="Aktif">Aktif
                                        <input type="radio" name="status" value="Tidak Aktif">Tidak AKtif
                                    </div>
                                    @if ($m->foto)
                                        <img src="{{ asset('gambar/'.$m->foto) }}" alt="" stye="width:100px">
                                    @endif
                                    <div class="form-group">
                                        <label for="">Foto</label>
                                        <input type="file" name="gambar" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="row">
                                <div class="col-md-6">
                                    <a href="/mahasiswa" class="btn btn-default">Kembali</a>
                                </div>
                                <div class="col-md-6 text-right">
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </section>
    @endforeach
@endsection

