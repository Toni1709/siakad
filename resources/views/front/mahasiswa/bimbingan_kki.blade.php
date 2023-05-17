@extends('front.master_mahasiswa')
@section('content')
<div class="page-breadcrumb d-flex d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-1">Bimbingan KKI</div>
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
    <div class="col-xl-4 mx-auto">
        <form action="/bimbingan/kki/input" method="post">
            @csrf
            <div class="card">
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-sm-12">
                            <label for="">Tanggal Bimbingan</label>
                            <input type="date" name="tgl" class="form-control">
                            <input type="hidden" name="id" value="{{ Auth::user()->id }}">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-12">
                            <label for="">Catatan</label>
                            <textarea name="catatan" rows="5" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-12">
                            <button type="submit" class="btn btn-sm btn-light">Save</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <div class="col-xl-8 mx-auto">
        <div class="card">
            <div class="card-body">
                <table class="table mb-0" id="example2">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Tanggal</th>
                            <th>Catatan</th>
                            <th>Verifikasi</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($bimbingan as $no => $b)
                            <tr>
                                <td>{{ $no+1 }}</td>
                                <td>{{ $b->tgl_bimbingan }}</td>
                                <td>{{ $b->catatan }}</td>
                                <td>{{ $b->verifikasi }}</td>
                                <td>
                                    <a href="/bimbingan/kki/hapus/{{ $b->id_bimbingankki }}" class="btn btn-sm btn-danger">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
