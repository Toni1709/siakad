@extends('master_admin')
@section('konten')
    @foreach ($kelas as $k)
        <div class="page-breadcrumb mb-3">
            <div class="row">
                <div class="col-5 align-self-center">
                    <h4 class="page-title">Absensi</h4>
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
                                <li class="breadcrumb-item active" aria-current="page">Absensi</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">

                            </div>
                            <form action="/absensi/tambah" method="post">
                                @csrf
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-2">
                                            <label for="" class="form-label">Kelas</label>
                                        </div>
                                        <div class="col-10">
                                            <label for="" class="form-label">: {{ $k->nama_kelas }}</label>
                                            <input type="hidden" name="kelas" value="{{ $k->id_kelas }}">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-2">
                                            <label for="" class="form-label">Jurusan</label>
                                        </div>
                                        <div class="col-10">
                                            <label for="" class="form-label">: {{ $k->nama_konsentrasi }}</label>
                                            <input type="hidden" name="konsentrasi" value="{{ $k->id_konsentrasi }}">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-2">
                                            <label for="" class="form-label">Dosen Pengampu</label>
                                        </div>
                                        <div class="col-10">
                                            <label for="" class="form-label">: {{ $k->nama_dosen }}</label>
                                        </div>
                                    </div>
                                    <div class="row" style="margin-bottom: 25px;">
                                        <div class="col-2">
                                            <label for="" class="form-label">Mata Pelajaran</label>
                                        </div>
                                        <div class="col-10">
                                            <label for="" class="form-label">: {{ $k->nama_mapel }}</label>
                                            <input type="hidden" name="mapel" value="{{ $k->id_mapel }}">
                                        </div>
                                    </div>
                                    <hr>
                                    <div class=" row mb-2">
                                        <div class="col-9"></div>
                                        <div class="col-3 text-right">
                                            <input type="date" name="tgl" value="{{ date('Y-m-d') }}" class="form-control">
                                        </div>
                                    </div>
                                    <table id="" class="table text-center table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th width="40">No.</th>
                                                <th>NIM</th>
                                                <th>Nama</th>
                                                <th width="100">Kehadiran</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($mahasiswa as $no => $m)
                                                <tr>
                                                    <th>{{ $no+1 }}</th>
                                                    <th>{{ $m->nim }}</th>
                                                    <th>{{ $m->nama_mahasiswa }}</th>
                                                    <th>
                                                        <input type="hidden" name="mahasiswa[{{ $no+1 }}]" value="{{ $m->id_mahasiswa }}">
                                                        <select name="kehadiran[{{ $no+1 }}]" id="" class="form-control">
                                                            <option value=""></option>
                                                            <option value="H">H</option>
                                                            <option value="S">S</option>
                                                            <option value="I">I</option>
                                                            <option value="A">A</option>
                                                            <option value="T">T</option>
                                                        </select>
                                                    </th>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="card-footer">
                                    <div class="row">
                                        <div class="col-6">
                                            <a href="" class="btn btn-secondary">Kembali</a>
                                        </div>
                                        <div class="col-6" align="right">
                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endforeach

@endsection
