@extends('master_admin')
@section('konten')
<div class="page-breadcrumb d-flex d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-1">Berkas Mahasiswa</div>
    <div class="ps-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
                <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Sertifikat KKI</li>
            </ol>
        </nav>
    </div>
</div>
<hr>
<div class="row">
    <div class="col-xl-12 mx-auto">
        <div class="card">
            <div class="card-header">

            </div>
            <div class="card-body table-responsive">
                <table class="table mb-0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>NIM</th>
                            <th>Nama Mahasiswa</th>
                            <th>Jurusan</th>
                            <th>Kelas</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($sertifikat as $no => $s)
                            <tr>
                                <td>{{ $no+1 }}</td>
                                <td>{{ $s->nim }}</td>
                                <td>{{ $s->nama_mahasiswa }}</td>
                                <td>{{ $s->nama_konsentrasi }}</td>
                                <td>{{ $s->nama_kelas }}</td>
                                <td>
                                    <a href="/berkas/sertifikat/hapus/{{ $s->id_sertifikat }}" class="btn btn-sm btn-danger">Delete</a>
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
