@extends('master_admin')
@section('konten')
@foreach ($kelas as $k)
<div class="page-breadcrumb d-flex d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-1">Absensi Mahasiswa</div>
    <div class="ps-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
                <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">{{ $k->nama_kelas }}</li>
            </ol>
        </nav>
    </div>
</div>
<div class="row">
    <div class="col-xl-12 mx-auto">
        <div class="card">
            <form action="/absensi/edit" method="post">
                @csrf
                <div class="card-body table-responsive">
                    <div class="row mb-2">
                        <table>
                            <tr>
                                <td width="150">Kelas</td>
                                <td width="15">:</td>
                                <td>{{ $k->nama_kelas }}</td>
                            </tr>
                            <tr>
                                <td>Jurusan</td>
                                <td>:</td>
                                <td>{{ $k->nama_konsentrasi }}</td>
                            </tr>
                            <tr>
                                <td>Dosen Pengampu</td>
                                <td>:</td>
                                <td>{{ $k->nama_dosen }}</td>
                            </tr>
                            <tr>
                                <td>Mata Pelajaran</td>
                                <td>:</td>
                                <td>{{ $k->nama_mapel }}</td>
                            </tr>
                        </table>
                    </div>
                    <hr>
                    <div class=" row mb-2">
                        <div class="col-lg-3 col-md-6">
                            <button type="button" class="btn btn-sm btn-light mb-3 mb-lg-0" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                <i class='bx bxs-plus-square'></i>
                                Input Absensi
                            </button>
                        </div>
                        <div class="col-6"></div>
                        <div class="col-lg-3 col-md-6 text-right">
                            <input type="date" name="tgl" value="{{ date('Y-m-d') }}" class="form-control">
                        </div>
                    </div>
                    <hr>
                    <table class="table mb-0">
                        <thead>
                            <tr>
                                <th width="40">No.</th>
                                <th>NIM</th>
                                <th>Nama</th>
                                <th width="100">Kehadiran</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($absensi as $no => $m)
                                @php
                                    $date = date('Y-m-d');
                                    $data = DB::table('absensi_mahasiswa')->where('id_mahasiswa', $m->id_mahasiswa)
                                        ->where('tanggal_absensi', $date)->first();
                                    @endphp
                                    @if($data == true &&  $date == $data->tanggal_absensi)
                                <tr>
                                    <th>{{ $no+1 }}</th>
                                    <th>{{ $m->nim }}</th>
                                    <th>{{ $m->nama_mahasiswa }}</th>
                                    <th>
                                        <input type="hidden" name="id[{{ $no+1 }}]" value="{{ $m->id_absensi }}">
                                        <input type="hidden" name="mahasiswa[{{ $no+1 }}]" value="{{ $m->id_mahasiswa }}">
                                        <select name="kehadiran[{{ $no+1 }}]" id="" class="form-control">
                                            <option value=""></option>
                                            <option value="H" {{ $m->kehadiran == 'H' ? 'selected' : '' }}>H</option>
                                            <option value="S" {{ $m->kehadiran == 'S' ? 'selected' : '' }}>S</option>
                                            <option value="I" {{ $m->kehadiran == 'I' ? 'selected' : '' }}>I</option>
                                            <option value="A" {{ $m->kehadiran == 'A' ? 'selected' : '' }}>A</option>
                                            <option value="T" {{ $m->kehadiran == 'T' ? 'selected' : '' }}>T</option>
                                        </select>
                                    </th>
                                </tr>
                                @endif
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
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="/absensi/tambah" method="post">
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
                                        $data = DB::table('absensi_mahasiswa')->where('id_mahasiswa', $m->id)
                                            ->where('tanggal_absensi', $date)
                                            ->first();
                                    @endphp
                                    @if ($data == false )
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
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endforeach
@endsection
