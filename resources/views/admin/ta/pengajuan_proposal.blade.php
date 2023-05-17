@extends('master_admin')
@section('konten')
<div class="page-breadcrumb d-flex d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-1">Tugas Akhir</div>
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
            <div class="card-body table-responsive">
                <table class="table mb-0">
                    <thead>
                        <tr>
                            <th>NIM</th>
                            <th>Nama</th>
                            <th>Kelas</th>
                            <th>Pembimbing 1</th>
                            <th>Pembimbing 2</th>
                            <th>Judul</th>
                            <th>File TA</th>
                            <th width="200">Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($judul as $no => $j)
                            <tr>
                                <td>{{ $no+1 }}</td>
                                <td>{{ $j->nama_mahasiswa }}</td>
                                <td>{{ $j->nama_kelas }}</td>
                                <td>{{ $j->nama_dosen }}</td>
                                <td>
                                    @if ($j->pembimbing1 == $j->pembimbing2)
                                        Belum Ditentukan
                                    @else
                                        {{ $j->nama_dosen }}
                                    @endif
                                </td>
                                <td>{{ $j->judul }}</td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-light mb-3 mb-lg-0" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $j->id_ta }}">
                                        Lihat TA
                                    </button>
                                </td>
                                <td>
                                    @if ($j->status_ta == 'ACC')
                                        ACC
                                    @elseif ($j->status_ta == 'Ditolak')
                                        Ditolak
                                    @else
                                        <button type="button" class="btn btn-sm btn-light mb-3 mb-lg-0" data-bs-toggle="modal" data-bs-target="#acc{{ $j->id_ta }}">
                                            ACC
                                        </button>
                                        <a href="/tugas_akhir/tolak/{{ $j->id_ta }}" class="btn btn-sm btn-danger">Tolak</a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
{{-- Modal  --}}
@foreach ($judul as $j)
    {{-- Lihat TA --}}
    <div class="modal fade" id="exampleModal{{ $j->id_ta }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <object data="{{ asset('berkas/pengajuan_ta/'.$j->file) }}" type="application/pdf" style="width:100%; height:50ch;"></object>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    {{-- ACC TA --}}
    <div class="modal fade" id="acc{{ $j->id_ta }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="/tugas_akhir/acc" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-12 mb-2">
                                <label for="" class="col-form-label">Pembimbing 2</label>
                                <input type="hidden" name="id" value="{{ $j->id_ta }}">
                                <select name="pembimbing2" id="" class="form-control">
                                    <option value="" disabled selected>-- Pilih Pembimbing 2 --</option>
                                    @foreach ($dosen as $d)
                                        <option value="{{ $d->id }}">{{ $d->nama_dosen }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-12 mb-2">
                                <label for="" class="col-form-label">Catatan</label>
                                <textarea name="catatan" rows="2" class="form-control"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-info" data-bs-dismiss="modal">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endforeach
@endsection
