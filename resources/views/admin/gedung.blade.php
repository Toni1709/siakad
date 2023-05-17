@extends('master_admin')
@section('konten')
<div class="page-breadcrumb d-flex d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-1">Gedung</div>
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
                            <th>Kode Gedung</th>
                            <th>Nama Gedung</th>
                            <th>Lebar(m)</th>
                            <th>Panjang(m)</th>
                            <th>Tinggi(m)</th>
                            <th>Luas(m)</th>
                            <th width="200">Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($gedung as $no => $g)
                            @php
                                $id = $g->id_gedung;
                            @endphp
                            <tr>
                                <td><b>{{ $g->id_gedung }}</b></td>
                                <td>{{ $g->nama_gedung }}</td>
                                <td>{{ $g->l }} m</td>
                                <td>{{ $g->p }} m</td>
                                <td>{{ $g->t }} m</td>
                                <td>{{ $g->luas }} m</td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $id }}">
                                        Update
                                    </button>
                                    <a href="/gedung/hapus/{{ $id }}" class="btn btn-sm btn-danger">Delete</a>
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
            <form action="/gedung/tambah" method="get">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Kode Gedung</label>
                        <input type="text" name="kode" value="{{ $kode }}" readonly class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Nama Gedung</label>
                        <input type="text" name="gedung" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Panjang(m)</label>
                        <input type="number" name="p" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Lebar(m)</label>
                        <input type="number" name="l" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Tinggi(m)</label>
                        <input type="number" name="t" class="form-control">
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
@foreach ($gedung as $g)
    @php
        $id = $g->id_gedung;
    @endphp
    <div class="modal fade" id="exampleModal{{ $id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="/gedung/edit" method="get">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="">Kode Gedung</label>
                            <input type="text" name="kode" value="{{ $id }}" readonly class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Nama Gedung</label>
                            <input type="text" name="gedung" value="{{ $g->nama_gedung }}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Panjang(m)</label>
                            <input type="text" name="p" value="{{ $g->p }}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Labar(m)</label>
                            <input type="text" name="l" value="{{ $g->l }}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Tinggi(m)</label>
                            <input type="text" name="t" value="{{ $g->t }}" class="form-control">
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
