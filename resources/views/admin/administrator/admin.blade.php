@extends('master_admin')
@section('konten')
<div class="page-breadcrumb d-flex d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-1">Data Admin</div>
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
                            <th width="40">No</th>
                            <th>Nama</th>
                            <th>Username</th>
                            <th>No. Telp</th>
                            <th>Alamat</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($admin as $no => $a)
                            <tr>
                                <td>{{ $no+1 }}</td>
                                <td>{{ $a->name }}</td>
                                <td>{{ $a->email }}</td>
                                <td>{{ $a->no_telp }}</td>
                                <td>{{ $a->alamat }}</td>
                                <td>
                                    {{-- <a href="/edit_mahasiswa/" class="btn btn-sm btn-warning"><i class="fa-solid fa-pencil"></i></a> --}}
                                    <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $a->id }}">
                                        Update
                                    </button>
                                    <a href="/admin/hapus/{{ $a->id }}" class="btn btn-sm btn-danger">Delete</a>
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
            <form action="admin/tambah" method="post">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Nama</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="">Username</label>
                        <input type="text" name="username" class="form-control"required>
                    </div>
                    <div class="form-group">
                        <label for="">Level</label>
                        <select name="level" id="" class="form-control" required>
                            <option value="">-- Pilih Level --</option>
                            <option value="admin">Admin</option>
                            <option value="akademik">Akademik</option>
                            <option value="keuangan">Keuangan</option>
                            <option value="cnp">C&P</option>
                            <option value="Perpustakaan">Perpustakaan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Password</label>
                        <input type="text" name="password" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="">No. Telp</label>
                        <input type="text" name="no_telp" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="">Alamat</label>
                        <textarea name="alamat" rows="3" class="form-control" required></textarea>
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
@foreach ($admin as $a)
        @php
            $id = $a->id;
        @endphp
    <div class="modal fade" id="exampleModal{{ $id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="admin/edit" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="">Nama</label>
                            <input type="text" class="form-control" name="name" value="{{ $a->name }}">
                            <input type="hidden" name="id" value="{{ $id }}">
                        </div>
                        <div class="form-group">
                            <label for="">Username</label>
                            <input type="text" class="form-control" name="username" value="{{ $a->email }}">
                        </div>
                        <div class="form-group">
                            <label for="">Level</label>
                            <select name="level" id="" class="form-control" required>
                                <option value="">-- Pilih Level --</option>
                                <option value="admin" {{ $a->level == 'admin' ? 'selected' : '' }}>Admin</option>
                                <option value="akademik" {{ $a->level == 'akademik' ? 'selected' : '' }}>Akademik</option>
                                <option value="keuangan" {{ $a->level == 'keuangan' ? 'selected' : '' }}>Keungan</option>
                                <option value="cnp" {{ $a->level == 'cnp' ? 'selected' : '' }}>C&P</option>
                                <option value="perpustakaan" {{ $a->level == 'perpustakaan' ? 'selected' : '' }}>Perpustakaan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Password</label>
                            <input type="text" class="form-control" name="password" placeholder="Masukkan Password Baru....">
                        </div>
                        <div class="form-group">
                            <label for="">No. Telp</label>
                            <input type="text" class="form-control" name="no_telp" value="{{ $a->no_telp }}">
                        </div>
                        <div class="form-group">
                            <label for="">Alamat</label>
                            <textarea name="alamat" rows="3" class="form-control">{{ $a->alamat }}</textarea>
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
