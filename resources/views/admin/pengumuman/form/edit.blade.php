@extends('master_admin')
@section('konten')
<div class="page-breadcrumb d-flex d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-1">Pengumuman</div>
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
    <div class="col-xl-9 mx-auto">
        <div class="card">
            <div class="card-body">
                <div class="border p-3 rounded">
                    <form action="/pengumuman/edit" method="post" class="row g-3">
                        @csrf
                        <div class="col-md-12">
                            <label for="">Judul Pengumuman</label>
                            <input type="hidden" name="id" value="{{ $pengumuman->id_pengumuman }}">
                            <input type="text" name="judul" value="{{ $pengumuman->judul_pengumuman }}" class="form-control">
                        </div>
                        <div class="col-md-12">
                            <label for="">Tujuan Pengumuman</label>
                            <select name="tujuan" id="" class="form-control">
                                <option value="Semua" {{ $pengumuman->tujuan == 'Semua' ? 'selected' : '' }}>Semua</option>
                                <option value="Dosen" {{ $pengumuman->tujuan == 'Dosen' ? 'selected' : '' }}>Dosen</option>
                                <option value="Mahasiswa" {{ $pengumuman->tujuan == 'Mahasiswa' ? 'selected' : '' }}>Mahasiswa</option>
                            </select>
                        </div>
                        <div class="col-md-12">
                            <label for="">Isi Pengumuman</label>
                            <textarea id="texteditor" rows="10" name="isi">{!! $pengumuman->isi_pengumuman !!}</textarea>
                        </div>
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-sm btn-light">Save Changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
