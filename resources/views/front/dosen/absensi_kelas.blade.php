@extends('front.master_dosen')
@section('content')
    <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-title-box">
                        <div class="btn-group float-right">
                            <ol class="breadcrumb hide-phone p-0 m-0">
                                <li class="breadcrumb-item">Tahun :</li>
                                <li class="breadcrumb-item">Bulan :</li>
                                <li class="breadcrumb-item">Semester :</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Absensi</h4>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <form action="/absensi/update" method="post">
                            @csrf
                            <div class="card-body new-user">
                                <h5 class="header-title mb-4 mt-0">Absensi Kelas</h5>
                                <div class="row">
                                    <div class="col-2">
                                        <div class="mb-0">
                                            <label for="" class="form-label">Kelas</label>
                                        </div>
                                    </div>
                                    <div class="col-10">
                                        <div class="mb-0">
                                            <label for="" class="form-label">: {{ $k->nama_kelas }}</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-2">
                                        <div class="mb-0">
                                            <label for="" class="form-label">Jurusan</label>
                                        </div>
                                    </div>
                                    <div class="col-10">
                                        <div class="mb-0">
                                            <label for="" class="form-label">: {{ $k->nama_konsentrasi }}</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-2">
                                        <div class="mb-0">
                                            <label for="" class="form-label">Dosen Pengampu</label>
                                        </div>
                                    </div>
                                    <div class="col-10">
                                        <div class="mb-0">
                                            <label for="" class="form-label">: {{ $k->nama_dosen }}</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-2">
                                        <div class="mb-0">
                                            <label for="" class="form-label">Mata Pelajaran</label>
                                        </div>
                                    </div>
                                    <div class="col-10">
                                        <div class="mb-0">
                                            <label for="" class="form-label">: {{ $k->nama_mapel }}</label>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="row mb-2">
                                    <div class="col-12">
                                        <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                            Input Absensi
                                        </button>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table class="table text-center table-hover mb-0">
                                        <thead>
                                            <tr>
                                                <th class="border-top-0">No</th>
                                                <th class="border-top-0">NIM</th>
                                                <th class="border-top-0">Nama</th>
                                                <th class="border-top-0" width="100">Kehadiran</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @foreach ($absensi as $no => $a)
                                            @php
                                                $date = date('Y-m-d');
                                                $data = DB::table('absensi_mahasiswa')
                                                    ->where('tanggal_absensi', $date)
                                                    ->where('id_mahasiswa', $a->id)
                                                    ->first();
                                            @endphp
                                            @if ($data == true && $date == $data->tanggal_absensi)
                                                <tr>
                                                    <td>{{ $no+1 }}</td>
                                                    <td>{{ $a->nim }}</td>
                                                    <td>{{ $a->nama_mahasiswa }}</td>
                                                    <td>
                                                        <input type="hidden" name="id[{{ $no+1 }}]" value="{{ $a->id_absensi }}">
                                                        <input type="hidden" name="mahasiswa[{{ $no+1 }}]" value="{{ $a->id_mahasiswa }}">
                                                        <select name="kehadiran[{{ $no+1 }}]" id="" class="form-control">
                                                            <option value=""></option>
                                                            <option value="H" {{ $a->kehadiran == 'H' ? 'selected' : '' }}>H</option>
                                                            <option value="S" {{ $a->kehadiran == 'S' ? 'selected' : '' }}>S</option>
                                                            <option value="I" {{ $a->kehadiran == 'I' ? 'selected' : '' }}>I</option>
                                                            <option value="A" {{ $a->kehadiran == 'A' ? 'selected' : '' }}>A</option>
                                                            <option value="T" {{ $a->kehadiran == 'T' ? 'selected' : '' }}>T</option>
                                                        </select>
                                                    </td>
                                                </tr>
                                            @endif
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="row">
                                    <div class="col-6">
                                        <a href="/absensi_kelas" class="btn btn-secondary">Kembali</a>
                                    </div>
                                    <div class="col-6" align="right">
                                        <button type="submit" class="btn btn-primary">Update</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
    </div>
    {{-- Modal Input Absensi --}}
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Input Absensi</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="/absensi/input" method="post">
                        @csrf
                        <div class="modal-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>NIM</th>
                                        <th>Nama</th>
                                        <th>Kehadiran</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <input type="hidden" name="tgl" value="{{ date('Y-m-d') }}">
                                    <input type="hidden" name="kelas" value="{{ $k->id_kelas }}">
                                    <input type="hidden" name="konsentrasi" value="{{ $k->id_konsentrasi }}">
                                    <input type="hidden" name="mapel" value="{{ $k->id_mapel }}">
                                    @foreach ($mahasiswa as $no => $m)
                                        @php
                                            $date = date('Y-m-d');
                                            $data = DB::table('absensi_mahasiswa')
                                                ->where('tanggal_absensi', $date)
                                                ->where('id_mahasiswa', $m->id)
                                                ->first();
                                        @endphp
                                        @if ($data == false)
                                            <tr>
                                                <td>{{ $no+1 }}</td>
                                                <td>{{ $m->nim }}</td>
                                                <td>{{ $m->nama_mahasiswa }}</td>
                                                <td>
                                                    <input type="hidden" name="mahasiswa[{{ $no+1 }}]" value="{{ $m->id }}">
                                                    <select name="kehadiran[{{ $no+1 }}]" id="" class="form-control">
                                                        <option value=""></option>
                                                        <option value="H">H</option>
                                                        <option value="S">S</option>
                                                        <option value="I">I</option>
                                                        <option value="A">A</option>
                                                        <option value="T">T</option>
                                                    </select>
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
    </div>
@endsection
