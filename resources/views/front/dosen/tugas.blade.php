@extends('front.master_dosen')
@section('content')
<div class="page-breadcrumb d-flex d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-1">Home</div>
    <div class="ps-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
                <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Absensi</li>
            </ol>
        </nav>
    </div>
</div>
<div class="row">
    <div class="col-xl-12 mx-auto">
        {{-- <h6 class="mb-0 text-uppercase">

        </h6> --}}
        <hr/>
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-sm-12">
                        <button type="button" class="btn btn-sm btn-light" data-bs-toggle="modal" data-bs-target="#exampleExtraLargeModal">
                            <i class='bx bxs-plus-square'></i>
                            New
                        </button>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="border p-4 rounded">
                    <table id="example2" class="table mb-0">
                        <thead>
                            <tr>
                                <th class="border-top-0">No</th>
                                <th class="border-top-0">Mata Kuliah</th>
                                <th class="border-top-0">Kelas</th>
                                <th class="border-top-0">Mulai</th>
                                <th class="border-top-0">Deadline</th>
                                <th class="border-top-0">Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tugas as $no => $t)
                                <tr>
                                    <td>{{ $no+1 }}</td>
                                    <td>{{ $t->nama_mapel }}</td>
                                    <td>{{ $t->nama_kelas }}</td>
                                    <td>{{ $t->mulai }}</td>
                                    <td>{{ $t->selesai }}</td>
                                    <td>
                                        <a href="/tugas/kelas/{{ $t->id_tugas }}" class="btn btn-sm btn-light">View</a>
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
{{-- Modal Add --}}
<div class="modal fade" id="exampleExtraLargeModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tugas</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="/tugas/tambah" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="">Kelas - Mata Kuliah</label>
                            <select name="id_jadwal" id="" class="form-control">
                                @foreach ($jadwal as $j)
                                    <option value="{{ $j->id_jadwal }}">{{ $j->nama_kelas }} -  {{ $j->nama_mapel }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="">File</label>
                            <input type="file" name="file" class="form-control">
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="">Keterangan</label>
                            <textarea name="keterangan" rows="3" class="form-control"></textarea>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="">Mulai</label>
                            <input type="datetime-local" name="mulai" class="form-control">
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="">Deadline</label>
                            <input type="datetime-local" name="selesai" class="form-control">
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
@endsection
