@extends('master_admin')
@section('konten')
<div class="page-breadcrumb d-flex d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-1">Biaya Non Pendidikan</div>
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
            <div class="card-header">
                <a href="/biaya/nonpendidikan/tambah" class="btn btn-sm btn-light mb-3 mb-lg-0">
                    <i class='bx bxs-plus-square'></i>
                    New
                </a>
                {{-- <button type="button" class="btn btn-sm btn-light mb-3 mb-lg-0" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    <i class='bx bxs-plus-square'></i>
                    New
                </button> --}}
            </div>
            <div class="card-body table-responsive">
                <table class="table mb-0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Tanggal</th>
                            <th>Kelas</th>
                            <th>NIM</th>
                            <th>Nama</th>
                            <th>Jumlah Bayar</th>
                            <th>Jenis</th>
                            <th>Keterangan</th>
                            <th>No. Bukti</th>
                            <th>Kasir</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($biaya as $no => $b)
                            <tr>
                                <td>{{ $no+1 }}</td>
                                <td>{{ $b->tgl_pembayaran }}</td>
                                <td>{{ $b->nama_kelas }}</td>
                                <td>{{ $b->nim }}</td>
                                <td>{{ $b->nama_mahasiswa }}</td>
                                <td>{{ $b->jml_bayar }}</td>
                                <td>{{ $b->jenis }}</td>
                                <td>{{ $b->keterangan }}</td>
                                <td>{{ $b->no_bukti }}</td>
                                <td>{{ $b->kasir }}</td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-light mb-3 mb-lg-0" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $b->id_biayanon }}">
                                        Update
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
{{-- Modal Upadate --}}
@foreach ($biaya as $b)
    <div class="modal fade" id="exampleModal{{ $b->id_biayanon }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="/biaya/nonakademik/edit" method="post">
                @csrf
                <input type="hidden" name="id" value="{{ $b->id_biayanon }}">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Nama</label>
                        <input type="text" name="kode" value="{{ $b->nama_mahasiswa }}" readonly class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Jenis</label>
                        <input type="text" name="jenis" value="{{ $b->jenis }}" readonly class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Keterangan</label>
                            <input type="text" name="keterangan" value="{{ $b->keterangan }}" readonly class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Jumlah Bayar</label>
                            <input type="text" name="jml_bayar" value="0" class="form-control">
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
@endforeach
@endsection
