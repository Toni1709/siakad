@extends('master_admin')
@section('konten')
<div class="page-breadcrumb d-flex d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-1">Tables</div>
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
                            <th width="100">No.</th>
                            <th>Semester</th>
                            <th>Ket</th>
                            <th width="200">Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($semester as $no => $s)
                            @php
                                $id = $s->id_semester;
                            @endphp
                            <tr>
                                <td>{{ $no+1 }}</td>
                                <td>{{ $s->semester }}</td>
                                <td>{{ $s->ket }}</td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $id }}">
                                        Update
                                    </button>
                                    <a href="/semester/hapus/{{ $id }}" class="btn btn-sm btn-danger">Delete</a>
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
            <form action="semester/tambah" method="post">
                {{ csrf_field() }}
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Semester</label>
                        <input type="number" name="semester" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Ket</label>
                        <select name="ket" id="" class="form-control">
                            <option value="Genap">Genap</option>
                            <option value="Ganjil">Ganjil</option>
                        </select>
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
@foreach ($semester as $s)
    @php
        $id = $s->id_semester;
    @endphp
    <div class="modal fade" id="exampleModal{{ $id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="semester/edit" method="post">
                    {{ csrf_field() }}
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="">Semester</label>
                            <input type="number" name="semester" value="{{ $s->semester }}" class="form-control">
                            <input type="hidden" name="id" value="{{ $id }}">
                        </div>
                        <div class="form-group">
                            <label for="">Ket</label>
                            <select name="ket" id="" class="form-control">
                                <option value="Genap" {{ $s->ket == 'Genap' ? 'selected' : '' }}>Genap</option>
                                <option value="Ganjil" {{ $s->ket == 'Ganjil' ? 'selected' : '' }}>Ganjil</option>
                            </select>
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
