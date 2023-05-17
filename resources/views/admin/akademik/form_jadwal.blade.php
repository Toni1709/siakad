@extends('master_admin')
@section('konten')
<div class="page-breadcrumb d-flex d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-1">Jadwal Kelas</div>
    <div class="ps-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
                <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Form</li>
            </ol>
        </nav>
    </div>
</div>
<div class="row">
    <div class="col-xl-12 mx-auto">
        <div class="card">
            <div class="card-header">
                <button type="button" class="btn btn-sm btn-light mb-3 mb-lg-0" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    <i class='bx bxs-plus-square'></i>
                    New
                </button>
            </div>
            <div class="card-body table-responsive">
                <table class="table mb-0">
                    <thead>
                        <tr>
                            <th width="40">No.</th>
                            <th>Mata Kuliah</th>
                            <th>Kelas</th>
                            <th>Semester</th>
                            <th>SKS</th>
                            <th>Hari</th>
                            <th>Ruang</th>
                            <th>JAM</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($jadwal as $no => $j)
                            <tr>
                                <td>{{ $no+1 }}</td>
                                <td>{{ $j->nama_mapel }}</td>
                                <td>{{ $j->nama_kelas }}</td>
                                <td>{{ $j->semester }}</td>
                                <td>{{ $j->sks }}</td>
                                <td>{{ $j->hari }}</td>
                                <td>{{ $j->nama_ruangan }}</td>
                                <td>{{ $j->jam_mulai }} s/d {{ $j->jam_selesai }}</td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-warning mb-3 mb-lg-0" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $j->id_jadwal }}">
                                        Update
                                    </button>
                                    <a href="/jadwal/hapus/{{ $j->id_jadwal }}" class="btn btn-sm btn-danger">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
{{-- Modal Input --}}
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="/tambah_jadwal" method="post">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-4">
                            <div class="mb-2">
                                <label for="" class="form-label">Semester</label>
                                <select name="semester" id="" class="form-control">
                                    <option value="">-- Pilih Semester --</option>
                                    @foreach ($semester as $s)
                                        <option value="{{ $s->id_semester }}">{{ $s->semester }} - {{ $s->ket }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="mb-2">
                                <label for="" class="form-label">Kelas</label>
                                <select name="kelas" id="" class="form-control">
                                    <option value="">-- Pilih Kelas --</option>
                                    @foreach ($kelas as $k)
                                        <option value="{{ $k->id_kelas }}">{{ $k->nama_kelas }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="mb-2">
                                <label for="" class="form-label">Ruang</label>
                                <select name="ruangan" id="" class="form-control">
                                    <option value="">-- Pilih Ruang --</option>
                                    @foreach ($ruangan as $r)
                                        <option value="{{ $r->id_ruangan }}">{{ $r->nama_ruangan }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-10">
                            <div class="mb-2">
                                <label for="" class="form-label">Mata Pelajaran</label>
                                <select name="mapel" id="" class="form-control">
                                    <option value="">-- Pilih Pelajaran --</option>
                                    @foreach ($mapel as $m)
                                        <option value="{{ $m->id_mapel }}">{{ $m->nama_mapel }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="mb-2">
                                <label for="" class="form-label">SKS</label>
                                <input type="number" name="sks" class="form-control">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-2">
                                <label for="" class="form-label">Dosen</label>
                                <select name="dosen" id="" class="form-control">
                                    <option value="">-- Pilih Dosen --</option>
                                    @foreach ($dosen as $d)
                                        <option value="{{ $d->id }}">{{ $d->nama_dosen }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-2">
                                <label for="" class="form-label">Hari</label>
                                <select name="hari" id="" class="form-control">
                                    <option value="">-- Pilih Hari --</option>
                                    <option value="Senin">Senin</option>
                                    <option value="Selasa">Selasa</option>
                                    <option value="Rabu">Rabu</option>
                                    <option value="Kamis">Kamis</option>
                                    <option value="Jumat">Jumat</option>
                                    <option value="Sabtu">Sabtu</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-2">
                                <label for="" class="form-label">Jam</label>
                                <select name="jam" id="" class="form-control">
                                    <option value="">-- Pilih Jam --</option>
                                    @foreach ($jam as $j)
                                        <option value="{{ $j->id_jam }}">{{ $j->jam_mulai }} s/d {{ $j->jam_selesai }}</option>
                                    @endforeach
                                </select>
                            </div>
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

{{-- Modal Update --}}
@foreach ($jadwal as $j)
    <div class="modal fade" id="exampleModal{{ $j->id_jadwal }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="/edit_jadwal" method="post">
                    @csrf
                    <input type="hidden" name="id" value="{{ $j->id_jadwal }}">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-4">
                                <div class="mb-2">
                                    <label for="" class="form-label">Semester</label>
                                    <select name="semester" id="" class="form-control">
                                        <option value="">-- Pilih Semester --</option>
                                        @foreach ($semester as $s)
                                            <option value="{{ $s->id_semester }}" {{ $j->id_semester == $s->id_semester ? 'selected' : '' }}>
                                                {{ $s->semester }} - {{ $s->ket }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="mb-2">
                                    <label for="" class="form-label">Kelas</label>
                                    <select name="kelas" id="" class="form-control">
                                        <option value="">-- Pilih Kelas --</option>
                                        @foreach ($kelas as $k)
                                            <option value="{{ $k->id_kelas }}" {{ $j->id_kelas == $k->id_kelas ? 'selected' : '' }}>
                                                {{ $k->nama_kelas }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="mb-2">
                                    <label for="" class="form-label">Ruang</label>
                                    <select name="ruangan" id="" class="form-control">
                                        <option value="">-- Pilih Ruang --</option>
                                        @foreach ($ruangan as $r)
                                            <option value="{{ $r->id_ruangan }}" {{ $j->id_ruangan == $r->id_ruangan ? 'selected' : '' }}>
                                                {{ $r->nama_ruangan }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-10">
                                <div class="mb-2">
                                    <label for="" class="form-label">Mata Pelajaran</label>
                                    <select name="mapel" id="" class="form-control">
                                        <option value="">-- Pilih Pelajaran --</option>
                                        @foreach ($mapel as $m)
                                            <option value="{{ $m->id_mapel }}" {{ $j->id_mapel == $m->id_mapel ? 'selected' : '' }}>{{ $m->nama_mapel }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="mb-2">
                                    <label for="" class="form-label">SKS</label>
                                    <input type="number" name="sks" value="{{ $j->sks }}" class="form-control">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-2">
                                    <label for="" class="form-label">Dosen</label>
                                    <select name="dosen" id="" class="form-control">
                                        <option value="">-- Pilih Dosen --</option>
                                        @foreach ($dosen as $d)
                                            <option value="{{ $d->id }}" {{ $j->id_karyawan == $d->id ? 'selected' : '' }}>{{ $d->nama_dosen }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-2">
                                    <label for="" class="form-label">Hari</label>
                                    <select name="hari" id="" class="form-control">
                                        <option value="">-- Pilih Hari --</option>
                                        <option value="Senin" {{ $j->hari == 'Senin' ? 'selected' : '' }}>Senin</option>
                                        <option value="Selasa" {{ $j->hari == 'Selasa' ? 'selected' : '' }}>Selasa</option>
                                        <option value="Rabu" {{ $j->hari == 'Rabu' ? 'selected' : '' }}>Rabu</option>
                                        <option value="Kamis" {{ $j->hari == 'Kamis' ? 'selected' : '' }}>Kamis</option>
                                        <option value="Jumat" {{ $j->hari == 'Jumat' ? 'selected' : '' }}>Jumat</option>
                                        <option value="Sabtu" {{ $j->hari == 'Sabtu' ? 'selected' : '' }}>Sabtu</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-2">
                                    <label for="" class="form-label">Jam</label>
                                    <select name="jam" id="" class="form-control">
                                        <option value="">-- Pilih Jam --</option>
                                        @foreach ($jam as $ja)
                                            <option value="{{ $j->id_jam }}" {{ $j->id_jam == $ja->id_jam ? 'selected' : '' }}>{{ $j->jam_mulai }} s/d {{ $j->jam_selesai }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endforeach
@endsection
