@extends('master_admin')
@section('konten')
<div class="page-breadcrumb d-flex d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-1">Data Magang Mahasiswa</div>
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
                            <th>Tanggal Proses</th>
                            <th>Nama Perusahaan</th>
                            <th>Penempatan</th>
                            <th>Posisi</th>
                            <th>Tanggal Mulai</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($magang_kerja as $no => $mk)
                            @php
                                $id = $mk->id_mk;
                            @endphp
                            <tr>
                                <td>{{ $no+1 }}</td>
                                <td>{{ $mk->tgl_proses }}</td>
                                <td>{{ $mk->nama_perusahaan }}</td>
                                <td>{{ $mk->penempatan }}</td>
                                <td>{{ $mk->posisi }}</td>
                                <td>{{ $mk->tgl_mulai }}</td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $id }}">
                                        Update
                                    </button>
                                    <a href="/magang_kerja/hapus/{{ $id }}" class="btn btn-sm btn-danger">Delete</a>
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
            <form action="/magang_kerja/tambah" method="post">
                @csrf
                <div class="modal-body">
                    <div class="row g-3">
                        <div class="col-lg-12 col-md-12">
                            <label for="">Tanggal Proses</label>
                            <input type="date" name="tgl_proses" class="form-control">
                        </div>
                        <div class="col-lg-12 col-md-12">
                            <label for="">Nama Perusahaan</label>
                            <select name="id_perusahaan" id="" class="form-control">
                                <option value="">-- Pilih Perusahaan --</option>
                                @foreach ($perusahaan as $p)
                                    <option value="{{ $p->id_perusahaan }}">{{ $p->nama_perusahaan }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-lg-12 col-md-12">
                            <label for="">Penempatan</label>
                            <select name="penempatan" id="" class="form-control">
                                <option value="Magang">Magang</option>
                                <option value="Kerja">Kerja</option>
                            </select>
                        </div>
                        <div class="col-lg-12 col-md-12">
                            <label for="">Posisi</label>
                            <input type="text" name="posisi" class="form-control">
                        </div>
                        <div class="col-lg-12 col-md-12">
                            <label for="">Tanggal Mulai</label>
                            <input type="date" name="tgl_mulai" class="form-control">
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
@foreach ($magang_kerja as $mk)
    @php
        $id = $mk->id_mk;
    @endphp
    <div class="modal fade" id="exampleModal{{ $id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="/magang_kerja/edit" method="post">
                    @csrf
                    <input type="hidden" name="id" value="{{ $id }}">
                    <div class="modal-body">
                        <div class="row g-3">
                            <div class="col-lg-12 col-md-12">
                                <label for="">Tanggal Proses</label>
                                <input type="date" name="tgl_proses" value="{{ $mk->tgl_proses }}" class="form-control">
                            </div>
                            <div class="col-lg-12 col-md-12">
                                <label for="">Nama Perusahaan</label>
                                <select name="id_perusahaan" id="" class="form-control">
                                    <option value="">-- Pilih Perusahaan --</option>
                                    @foreach ($perusahaan as $p)
                                        <option value="{{ $p->id_perusahaan }}" {{ $mk->id_perusahaan == $p->id_perusahaan ? 'selected' : '' }}>
                                            {{ $p->nama_perusahaan }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-12 col-md-12">
                                <label for="">Penempatan</label>
                                <select name="penempatan" id="" class="form-control">
                                    <option value="Magang" {{ $mk->penempatan == 'Magang' ? 'selected' : '' }}>Magang</option>
                                    <option value="Kerja" {{ $mk->penempatan == 'Kerja' ? 'selected' : '' }}>Kerja</option>
                                </select>
                            </div>
                            <div class="col-lg-12 col-md-12">
                                <label for="">Posisi</label>
                                <input type="text" name="posisi" value="{{ $mk->posisi }}" class="form-control">
                            </div>
                            <div class="col-lg-12 col-md-12">
                                <label for="">Tanggal Mulai</label>
                                <input type="date" name="tgl_mulai" value="{{ $mk->tgl_mulai }}" class="form-control">
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
