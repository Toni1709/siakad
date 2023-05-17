@extends('front.master_dosen')
@section('content')
<div class="page-breadcrumb d-flex d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-1">Tables</div>
    <div class="ps-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
                <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Basic Table</li>
            </ol>
        </nav>
    </div>
</div>
<div class="row">
    <div class="col-xl-12 mx-auto">
        <h6 class="mb-0 text-uppercase">Basic Table</h6>
        <hr/>
        <div class="card">
            <div class="card-body table-responsive">
                <table class="table mb-0">
                    <thead>
                        <tr>
                            <th class="border-top-0">No</th>
                            <th class="border-top-0">NIM</th>
                            <th class="border-top-0">Nama Mahasiswa</th>
                            <th class="border-top-0">Kelas</th>
                            <th class="border-top-0">Judul</th>
                            <th class="border-top-0">Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($verifikasi as $no => $v)
                            <tr>
                                <td>{{ $no+1 }}</td>
                                <td>{{ $v->nim }}</td>
                                <td>{{ $v->nama_mahasiswa }}</td>
                                <td>{{ $v->nama_kelas }}</td>
                                <td>{{ $v->judul }}</td>
                                <td>
                                    @if ($v->ver_pembimbing != null)
                                        <a href="#" class="btn btn-sm btn-success">Diverifikasi</a>
                                    @else
                                        <a href="/verifikasi/sidang/{{ $v->id_ver_sidang }}" class="btn btn-sm btn-danger">Menunggu Diverifikasi</a>
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
@endsection
