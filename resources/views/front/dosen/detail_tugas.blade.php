@extends('front.master_dosen')
@section('content')
<div class="page-breadcrumb d-flex d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-1">Home</div>
    <div class="ps-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
                <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Tugas</li>
                <li class="breadcrumb-item active" aria-current="page">Kelas</li>
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
            <div class="card-body">
                <div class="border p-4 rounded">
                    <table id="example2" class="table mb-0">
                        <thead>
                            <tr>
                                <th class="border-top-0">No</th>
                                <th class="border-top-0">NIM</th>
                                <th class="border-top-0">Nama</th>
                                <th class="border-top-0">File</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($mahasiswa as $no => $m)
                                <tr>
                                    <td>{{ $no+1 }}</td>
                                    <td>{{ $m->nim }}</td>
                                    <td>{{ $m->nama_mahasiswa }}</td>
                                    <td>
                                        <a href="/tugas/download/{{ $m->file_tugas }}" class="btn btn-light btn-sm">Download</a>
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
@endsection
