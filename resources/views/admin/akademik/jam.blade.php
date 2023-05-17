@extends('master_admin')
@section('konten')
<div class="page-breadcrumb d-flex d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-1">Jam</div>
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
                <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Add
                </button>
            </div>
            <div class="card-body table-responsive">
                <table class="table mb-0">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Tahun</th>
                            <th>Jam Mulai</th>
                            <th>Jam Selesai</th>
                            <th width="200">Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($jam as $no => $j)
                            @php
                                $id = $j->id_jam;
                            @endphp
                            <tr>
                                <td>{{ $no+1 }}</td>
                                <td>{{ $j->tahun }}</td>
                                <td>{{ $j->jam_mulai }}</td>
                                <td>{{ $j->jam_selesai }}</td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $id }}">
                                        Update
                                    </button>
                                    <a href="/kelas/hapus/{{ $id }}" class="btn btn-sm btn-danger">Delete</a>
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
            <form action="jam/tambah" method="post">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Tahun</label>
                        <select name="tahun" id="" class="form-control">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Jam Mulai</label>
                        <input type="time" name="jam_mulai" required class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Jam Selesai</label>
                        <input type="time" name="jam_selesai" required class="form-control">
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
@foreach ($jam as $j)
@php
$tahun = $j->tahun;
@endphp
    <div class="modal fade" id="exampleModal{{ $j->id_jam }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="jam/tambah" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="">Tahun</label>
                            <select name="tahun" id="" class="form-control">
                                <option value="1" {{ $tahun == '1' ? 'selected' : '' }}>1</option>
                                <option value="2" {{ $tahun == '2' ? 'selected' : '' }}>2</option>
                                <option value="3" {{ $tahun == '3' ? 'selected' : '' }}>3</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Jam Mulai</label>
                            <input type="time" name="jam_mulai" value="{{ $j->jam_mulai }}" required class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Jam Selesai</label>
                            <input type="time" name="jam_selesai" value="{{ $j->jam_selesai }}" required class="form-control">
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
