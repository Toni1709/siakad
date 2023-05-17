@extends('master_admin')
@section('konten')
<div class="page-breadcrumb d-flex d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-1">Perusahaan</div>
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
                            <th>Nama Perusahaan</th>
                            <th>Kontak</th>
                            <th>Email</th>
                            <th>Alamat</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($perusahaan as $no => $p)
                            @php
                                $id = $p->id_perusahaan;
                            @endphp
                            <tr>
                                <td>{{ $no+1 }}</td>
                                <td>{{ $p->nama_perusahaan }}</td>
                                <td>{{ $p->kontak }}</td>
                                <td>{{ $p->email }}</td>
                                <td>{{ $p->alamat }}</td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $id }}">
                                        Update
                                    </button>
                                    <a href="/perusahaan/hapus/{{ $id }}" class="btn btn-sm btn-danger">Delete</a>
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
            <form action="/perusahaan/tambah" method="post">
                @csrf
                <div class="modal-body">
                    <div class="row g-3">
                        <div class="col-lg-12 col-md-12">
                            <label for="">Nama Perusahaan</label>
                            <input type="text" name="nama" class="form-control">
                        </div>
                        <div class="col-lg-12 col-md-12">
                            <label for="">Email</label>
                            <input type="text" name="email" class="form-control">
                        </div>
                        <div class="col-lg-12 col-md-12">
                            <label for="">Kontak</label>
                            <input type="text" name="kontak" class="form-control">
                        </div>
                        <div class="col-lg-12 col-md-12">
                            <label for="">Alamat</label>
                            <textarea name="alamat" rows="4" class="form-control"></textarea>
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
@foreach ($perusahaan as $p)
    @php
        $id = $p->id_perusahaan;
    @endphp
    <div class="modal fade" id="exampleModal{{ $id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="/perusahaan/edit" method="post">
                    @csrf
                <input type="hidden" name="id" value="{{ $id }}">

                    <div class="modal-body">
                        <div class="row g-3">
                            <div class="col-lg-12 col-md-12">
                                <label for="">Nama Perusahaan</label>
                                <input type="text" name="nama" value="{{ $p->nama_perusahaan }}" class="form-control">
                            </div>
                            <div class="col-lg-12 col-md-12">
                                <label for="">Email</label>
                                <input type="text" name="email" value="{{ $p->email }}" class="form-control">
                            </div>
                            <div class="col-lg-12 col-md-12">
                                <label for="">Kontak</label>
                                <input type="text" name="kontak" value="{{ $p->kontak }}" class="form-control">
                            </div>
                            <div class="col-lg-12 col-md-12">
                                <label for="">Alamat</label>
                                <textarea name="alamat" rows="4" class="form-control">{{ $p->alamat }}</textarea>
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
