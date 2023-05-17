@extends('master_admin')
@section('konten')
<div class="page-breadcrumb d-flex d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-1">Biaya Non Pendidikan</div>
    <div class="ps-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
                <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Form</li>
            </ol>
        </nav>
    </div>
</div>
<hr>
<div class="row">
    <div class="col-xl-7 mx-auto">
        <div class="card">
            <div class="card-body">
                <div class="border p-3 rounded">
                    <form action="/biaya/nonakademik/tambah" method="post" class="row g-3">
                        @csrf
                        <div class="col-md-12">
                            <label for="">Nama</label>
                            <select name="id_mahasiswa" id="" class="single-select">
                                <option value="">-- Pilih Nama --</option>
                                @foreach ($mahasiswa as $m)
                                    <option value="{{ $m->id }}">{{ $m->nama_mahasiswa }} - {{ $m->nama_kelas }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-12">
                            <label for="">Jenis</label>
                            <input type="text" name="jenis" class="form-control">
                        </div>
                        <div class="col-md-12">
                            <label for="">Keterangan</label>
                            <input type="text" name="keterangan" class="form-control">
                        </div>
                        <div class="col-md-12">
                            <label for="">Jumlah Bayar</label>
                            <input type="text" name="jml_bayar" class="form-control">
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-light px-5">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
