@extends('master_admin')
@section('konten')
<div class="page-breadcrumb d-flex d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-1">Pinjaman Buku</div>
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
    <div class="col-xl-9 mx-auto">
        <div class="card border-top border-0 border-4 border-white">
            <div class="card-body">
                <div class="border p-4 rounded">
                    <div class="card-title d-flex align-items-center">
                        <div><i class="bx bxs-user me-1 font-22 text-white"></i>
                        </div>
                        <h5 class="mb-0 text-white">Form Pinjaman Buku</h5>
                    </div>
                    <hr/>
                    <form action="/pinjaman/tambah" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                            <label for="inputChoosePassword2" class="col-sm-3 col-form-label">Mahasiswa</label>
                            <div class="col-sm-9">
                                <select name="id_mahasiswa" class="single-select">
                                    <option value="">-- Choose --</option>
                                    @foreach ($mahasiswa as $m)
                                        <option value="{{ $m->id }}">{{ $m->id_kelas }} | {{ $m->nama_mahasiswa }} - {{ $m->nama_kelas }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputChoosePassword2" class="col-sm-3 col-form-label">Buku</label>
                            <div class="col-sm-9">
                                <select name="id_buku" class="single-select">
                                    <option value="">-- Choose --</option>
                                    @foreach ($buku as $b)
                                        <option value="{{ $b->id_buku }}">{{ $b->jenis_buku }} | {{ $b->judul_buku }} - {{ $b->tahun_terbit }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputChoosePassword2" class="col-sm-3 col-form-label">Tanggal Pinjam</label>
                            <div class="col-sm-9">
                                <input type="date" name="tgl_pinjam" value="{{ date('Y-m-d') }}" class="form-control">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputChoosePassword2" class="col-sm-3 col-form-label">Lama Pinjam</label>
                            <div class="col-sm-9">
                                <input type="number" name="lama_pinjam" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-3 col-form-label"></label>
                            <div class="col-sm-9">
                                <button type="submit" class="btn btn-light px-5">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
