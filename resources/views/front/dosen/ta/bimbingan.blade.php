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
                            <th class="border-top-0">Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($mahasiswa as $no => $m)
                            <tr>
                                <td>{{ $no+1 }}</td>
                                <td>{{ $m->nim }}</td>
                                <td>{{ $m->nama_mahasiswa }}</td>
                                <td>{{ $m->nama_kelas }}</td>
                                <td>
                                    <button type="button" class="btn btn-light" data-bs-toggle="modal" data-bs-target="#exampleExtraLargeModal{{ $m->id_ta }}">
                                        Lihat Bimbingan
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
{{-- Modal Verifikasi --}}
@foreach ($mahasiswa as $m)
    @php
        $bimbingan = DB::table('bimbingan_ta as bt')
            ->join('mahasiswa as m', 'm.id', '=', 'bt.id_mahasiswa')
            ->where('bt.id_mahasiswa', $m->id_mahasiswa)
            ->get();
    @endphp
<div class="modal fade" id="exampleExtraLargeModal{{ $m->id_ta }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="/bimbingan/verifikasi" method="post">
                @csrf
                <div class="modal-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Tanggal</th>
                                <th>NIM</th>
                                <th>Nama</th>
                                <th>BAB</th>
                                <th>Catatan</th>
                                <th>Verifikasi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($bimbingan as $b)
                                <tr>
                                    <td>
                                        <input type="checkbox" name="verifikasi[{{ $no+1 }}]" value="Diverifikasi">
                                        <input type="hidden" name="id[{{ $no+1 }}]" value="{{ $b->id_bimbingan_ta }}">
                                    </td>
                                    <td>{{ $b->tgl_bimbingan }}</td>
                                    <td>{{ $b->nim }}</td>
                                    <td>{{ $b->nama_mahasiswa }}</td>
                                    <td>{{ $b->bab }}</td>
                                    <td>{{ $b->catatan }}</td>
                                    <td>{{ $b->verifikasi }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Verifikasi</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach
@endsection
