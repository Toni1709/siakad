@extends('front.master_mahasiswa')
@section('content')
<div class="page-breadcrumb d-flex d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-1">Home</div>
    <div class="ps-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
                <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Tugas</li>
            </ol>
        </nav>
    </div>
</div>
<div class="row">
    <div class="col-xl-12 mx-auto">
        {{-- <h6 class="mb-0 text-uppercase">Basic Table</h6> --}}
        <hr/>
        <div class="card">
            <div class="card-body">
                <div class="border rounded p-4">
                    <table id="example2" class="table mb-0">
                        <thead>
                            <tr>
                                <th class="border-top-0">No</th>
                                <th class="border-top-0">Mata Kuliah</th>
                                <th class="border-top-0">Dosen</th>
                                <th class="border-top-0">Waktu Mulai</th>
                                <th class="border-top-0">Deadline</th>
                                <th class="border-top-0">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tugas as $no => $t)
                                @php
                                    date_default_timezone_set('Asia/Jakarta');
                                    $tgl_mulai = date('Y-m-d H:i:s', strtotime($t->mulai));
                                    $tgl_selesai = date('Y-m-d H:i:s', strtotime($t->selesai));
                                @endphp
                                <tr>
                                    <td>{{ $no+1 }}</td>
                                    <td>{{ $t->nama_mapel }}</td>
                                    <td>{{ $t->nama_dosen }}</td>
                                    <td>{{ $t->mulai }}</td>
                                    <td>{{ $t->selesai }}</td>
                                    <td>
                                        @if  (date('Y-m-d H:i:s') >= $tgl_mulai)
                                            @if (date('Y-m-d H:i:s') <= $tgl_selesai)
                                                @if ($t->file)
                                                    <a href="/download/tugas/{{ $t->file }}" class="btn btn-sm btn-secondary">Download</a>
										            <button type="button" class="btn btn-sm btn-light" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $t->id_tugas }}">Upload</button>
                                                @endif
                                            @else
                                                Waktu Habis
                                            @endif
                                        @endif
                                    </td>
                                </tr>
                                <div class="modal fade" id="exampleModal{{ $t->id_tugas }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Upload Tugas</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <form action="/tugas/upload" method="post" enctype="multipart/form-data">
                                                @csrf
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-md-12 mb-3">
                                                            <label for="">File Tugas</label>
                                                            <input type="file" name="file" class="form-control">
                                                            <input type="hidden" name="id_tugas" value="{{ $t->id_tugas }}">
                                                            <input type="hidden" name="id_mahasiswa" value="{{ Auth::user()->id }}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Upload</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
