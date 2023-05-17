@extends('master_admin')
@section('konten')
<div class="page-breadcrumb d-flex d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-1">Jurusan</div>
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
<div class="row ">
    <div class="col-xl-9 mx-auto">
        <h6 class="mb-0 text-uppercase">Primary Nav Tabs</h6>
        <hr/>
        <div class="card">
            <div class="card-body">
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active" data-bs-toggle="tab" href="#primaryhome" role="tab" aria-selected="true">
                            <div class="d-flex align-items-center">
                                <div class="tab-icon"><i class='bx bx-home font-18 me-1'></i>
                                </div>
                                <div class="tab-title">Konsentrasi</div>
                            </div>
                        </a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" data-bs-toggle="tab" href="#primaryprofile" role="tab" aria-selected="false">
                            <div class="d-flex align-items-center">
                                <div class="tab-icon"><i class='bx bx-user-pin font-18 me-1'></i>
                                </div>
                                <div class="tab-title">Program Studi</div>
                            </div>
                        </a>
                    </li>
                </ul>
                <div class="tab-content py-3">
                    <div class="tab-pane fade show active" id="primaryhome" role="tabpanel">
                        <div class="table-responsive">
                            <div class="mb-2">
                                <button type="button" class="btn btn-sm btn-light mb-3 mb-lg-0" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    <i class='bx bxs-plus-square'></i>
                                    New
                                </button>
                            </div>
                            <table class="table table-hover table-bordered">
                                <thead>
                                    <tr>
                                        <th>Kode</th>
                                        <th>Konsentrasi</th>
                                        <th>Program Studi</th>
                                        <th width="200">Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($konsentrasi as $k)
                                        @php
                                            $id_konsentrasi = $k->id_konsentrasi;
                                        @endphp
                                        <tr>
                                            <td><b>{{ $id_konsentrasi }}</b></td>
                                            <td>{{ $k->nama_konsentrasi }}</td>
                                            <td>{{ $k->nama_prodi }}</td>
                                            <td>
                                                <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $id_konsentrasi }}">
                                                    Update
                                                </button>
                                                <a href="/konsentrasi/hapus/{{ $id_konsentrasi }}" class="btn btn-sm btn-danger">Delete</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="primaryprofile" role="tabpanel">
                        <div class="table-responsive">
                            <div class="mb-2">
                                <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal2">
                                    Add
                                </button>
                            </div>
                            <table class="table table-hover table-bordered">
                                <thead>
                                    <tr>
                                        <th>Kode</th>
                                        <th>Program Studi</th>
                                        <th width="200">Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($prodi as $p)
                                        @php
                                            $id_prodi = $p->id_prodi;
                                        @endphp
                                        <tr>
                                            <td><b>{{ $id_prodi }}</b></td>
                                            <td>{{ $p->nama_prodi }}</td>
                                            <td>
                                                {{-- <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal2{{ $id_prodi }}">
                                                    Update
                                                </button> --}}
                                                <a href="/prodi/hapus/{{ $id_prodi }}" class="btn btn-sm btn-danger"><i class="fa-solid fa-trash"></i>Delete</a>
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- Modal Input Konsentrasi --}}
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="konsentrasi/tambah" method="get">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Kode Konsentrasi</label>
                        <input type="text" name="kode" required class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Program Studi</label>
                        <select name="id_prodi" id="" class="form-control">
                            <option value="">-- Pilih Prodi --</option>
                            @foreach ($prodi as $p)
                                <option value="{{ $p->id_prodi }}">{{ $p->id_prodi }} | {{ $p->nama_prodi }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Nama Konsentrasi</label>
                        <input type="text" name="konsentrasi" class="form-control">
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
{{-- Modal Input Prodi --}}
<div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="/prodi/tambah" method="get">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Kode Prodi</label>
                        <input type="text" name="kode"  class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Nama Prodi</label>
                        <input type="text" name="prodi" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Nama Konsentrasi</label>
                        <input type="text" name="konsentrasi" class="form-control">
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
{{-- Modal Update Konsentrasi --}}
@foreach ($konsentrasi as $k)
    @php
        $id_konsentrasi = $k->id_konsentrasi;
        $prodi = $k->id_prodi;
    @endphp
    <div class="modal fade" id="exampleModal{{ $id_konsentrasi }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="/konsentrasi/edit" method="get">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="">Kode Konsentrasi</label>
                            <input type="text" name="kode" value="{{ $id_konsentrasi }}" readonly readonly class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Program Studi</label>
                            <input type="text" value="{{ $k->nama_prodi }}" readonly class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Konsentrasi</label>
                            <input type="text" name="konsentrasi" value="{{ $k->nama_konsentrasi }}" class="form-control">
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

{{-- Modal Update Prodi --}}
{{-- @foreach ($prodi as $p)
        @php
            $id_prodi = $p->id_prodi;
        @endphp
    <div class="modal fade" id="exampleModal2{{ $id_prodi }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="/prodi/edit" method="get">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="">Kode Prodi</label>
                            <input type="text" name="kode" value="{{ $id_prodi }}" readonly class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Nama Prodi</label>
                            <input type="text" name="prodi" value="{{ $p->nama_prodi }}" class="form-control">
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
@endforeach --}}
@endsection
