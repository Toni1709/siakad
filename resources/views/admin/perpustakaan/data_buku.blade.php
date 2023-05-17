@extends('master_admin')
@section('konten')
<div class="page-breadcrumb d-flex d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-1">Daftar Buku</div>
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
                            <th>No.</th>
                            <th>Jenis Buku</th>
                            <th>Judul Buku</th>
                            <th>Penerbit</th>
                            <th>Tahun Terbit</th>
                            <th>Jumlah Buku</th>
                            <th width="200">Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($daftarbuku as $no => $b)
                            @php
                                $id = $b->id_buku;
                            @endphp
                            <tr>
                                <td>{{ $no+1 }}</td>
                                <td>{{ $b->jenis_buku }}</td>
                                <td>{{ $b->judul_buku }}</td>
                                <td>{{ $b->penerbit }}</td>
                                <td>{{ $b->tahun_terbit }}</td>
                                <td>{{ $b->jumlah_buku }}</td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $id }}">
                                        Update
                                    </button>
                                    <a href="/daftar_buku/hapus/{{ $id }}" class="btn btn-sm btn-danger">Delete</a>
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
            <form action="/daftar_buku/tambah" method="post">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="mb-2">
                                <label for="" class="form-label">Jenis Buku</label>
                                <select name="jenis_buku" class="form-control">
                                    <option disabled selected>-- Pilih Jenis Buku --</option>
                                    @foreach ($jenis_buku as $j)
                                        <option value="{{ $j->id_jenis_buku }}">{{ $j->jenis_buku }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-2">
                                <label for="" class="form-label">Penerbit</label>
                                <input type="text" name="penerbit" class="form-control">
                            </div>
                            <div class="mb-2">
                                <label for="" class="form-label">Jumlah Buku</label>
                                <input type="number" name="jumlah" class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-2">
                                <label for="" class="form-label">Judul Buku</label>
                                <input type="text" name="judul" class="form-control">
                            </div>
                            <div class="mb-2">
                                <label for="" class="form-label">Tahun Terbit</label>
                                <input type="text" name="tahun" class="form-control">
                            </div>
                            <div class="mb-2">
                                <label for="" class="form-label">Tanggal Buku Masuk</label>
                                <input type="date" name="tanggal" class="form-control">
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
@foreach ($daftarbuku as $b)
    @php
        $id = $b->id_buku;
    @endphp
    <div class="modal fade" id="exampleModal{{ $id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="/daftar_buku/edit" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="mb-2">
                                <label for="" class="form-label">Jenis Buku</label>
                                <input type="hidden" name="id" value="{{ $id }}">
                                <select name="jenis_buku" class="form-control">
                                    <option disabled selected>-- Pilih Jenis Buku --</option>
                                    @foreach ($jenis_buku as $j)
                                        <option value="{{ $j->id_jenis_buku }}" {{ $j->id_jenis_buku == $b->id_jenis_buku ? 'selected' : '' }}>{{ $j->jenis_buku }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-2">
                                <label for="" class="form-label">Penerbit</label>
                                <input type="text" name="penerbit" value="{{ $b->penerbit }}" class="form-control">
                            </div>
                            <div class="mb-2">
                                <label for="" class="form-label">Jumlah Buku</label>
                                <input type="number" name="jumlah" value="{{ $b->jumlah_buku }}" class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-2">
                                <label for="" class="form-label">Judul Buku</label>
                                <input type="text" name="judul" value="{{ $b->judul_buku }}" class="form-control">
                            </div>
                            <div class="mb-2">
                                <label for="" class="form-label">Tahun Terbit</label>
                                <input type="text" name="tahun" value="{{ $b->tahun_terbit }}" class="form-control">
                            </div>
                            <div class="mb-2">
                                <label for="" class="form-label">Tanggal Buku Masuk</label>
                                <input type="date" name="tanggal" value="{{ $b->tanggal_masuk }}" class="form-control">
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
