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
        {{-- <h6 class="mb-0 text-uppercase">Basic Table</h6> --}}
        <hr/>
        <div class="card">
            <div class="card-body">
                <div class="border p-4 rounded">
                    <table id="example2" class="table mb-0">
                        <thead>
                            <tr>
                                <th class="border-top-0">No</th>
                                <th class="border-top-0">Kelas</th>
                                <th class="border-top-0">Mata Kuliah</th>
                                <th class="border-top-0">Dosen</th>
                                <th class="border-top-0">Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($kelas as $no => $k)
                                <tr>
                                    <td>{{ $no+1 }}</td>
                                    <td>{{ $k->nama_kelas }}</td>
                                    <td>{{ $k->nama_mapel }}</td>
                                    <td>{{ $k->nama_dosen }}</td>
                                    <td>
                                        <a href="/absensi/kelas/{{ $k->id_kelas }}" class="btn btn-sm btn-info">Lihat Absensi</a>
                                        @if ($k->aktif == 'aktif')
                                            <a href="/absensi_kelas/aktif/{{ $k->id_jadwal }}" class="btn btn-sm btn-success">Aktif</a>
                                            @else
                                            <a href="/absensi_kelas/nonaktif/{{ $k->id_jadwal }}" class="btn btn-sm btn-danger">Non Aktif</a>
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
</div>
@endsection
