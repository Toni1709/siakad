@extends('master_admin')
@section('konten')
<div class="page-breadcrumb d-flex d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-1">Ruangan</div>
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
    <div class="col-xl-9 mx-auto">
        <h6 class="mb-0 text-uppercase">Basic Table</h6>
        <hr/>
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
                            <th>Kode Ruangan</th>
                            <th>Ruangan</th>
                            <th>Kapasitas</th>
                            <th>Gedung</th>
                            <th width="200">Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tbody>
                            @foreach ($ruangan as $r)
                                @php
                                    $id = $r->id_ruangan;
                                @endphp
                                <tr>
                                    <td><b>{{ $id }}</b></td>
                                    <td>{{ $r->nama_ruangan }}</td>
                                    <td>{{ $r->kapasitas }}</td>
                                    <td>{{ $r->nama_gedung }}</td>
                                    <td>
                                    <button type="button" class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $id }}">
                                        Update
                                    </button>
                                    <a href="/ruangan/hapus/{{ $id }}" class="btn btn-sm btn-danger">Delete</a>
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
            <form action="/ruangan/tambah" method="get">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Kode Ruangan</label>
                        <input type="text" name="kode" value="{{ $kode }}" readonly class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Gedung</label>
                        <select name="id_gedung" id="" class="form-control">
                            <option value="">-- Pilih Gedung --</option>
                            @foreach ($pilih_gedung as $g)
                                <option value="{{ $g->id_gedung }}">{{ $g->id_gedung }} | {{ $g->nama_gedung }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Nama Ruangan</label>
                        <input type="text" name="ruangan" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Kapasitas</label>
                        <input type="number" name="kapasitas" class="form-control">
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
@foreach ($ruangan as $r)
        @php
            $id = $r->id_ruangan;
            $gedung = $r->id_gedung;
        @endphp
    <div class="modal fade" id="exampleModal{{ $id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="/ruangan/edit" method="get">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="">Kode Ruangan</label>
                            <input type="text" name="kode" value="{{ $id }}" readonly class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Gedung</label>
                            <select name="id_gedung" id="" class="form-control">
                                <option value="">-- Pilih Gedung --</option>
                                @foreach ($pilih_gedung as $g)
                                    <option value="{{ $g->id_gedung }}" {{ $r->id_gedung == $g->id_gedung ? 'selected' : '' }}>
                                        {{ $g->id_gedung }} | {{ $g->nama_gedung }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Nama Ruangan</label>
                            <input type="text" name="ruangan" value="{{ $r->nama_ruangan }}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Kapasitas</label>
                            <input type="number" name="kapasitas" value="{{ $r->kapasitas }}" class="form-control">
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
