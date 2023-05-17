@extends('master_admin')
@section('konten')
<div class="page-breadcrumb d-flex d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-1">Kelas</div>
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
        <h6 class="mb-0 text-uppercase">Basic Table</h6>
        <hr/>
        <div class="card">
            <div class="card-header">
                <button type="button" class="btn btn-sm btn-light mb-3 mb-lg-0" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    <i class='bx bxs-plus-square'></i>
                    New
                </button>
            </div>
            <div class="card-body table-responsive">
                <table class="table mb-0">
                    <thead>
                        <tr>
                            <th>Nama Kelas</th>
                            <th>PA</th>
                            <th>Jurusan</th>
                            {{-- <th>Jumlah</th> --}}
                            <th width="200">Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($kelas as $ke)
                            @php
                                $id = $ke->id_kelas;
                            @endphp
                            <tr>
                                <td>{{ $ke->nama_kelas }}</td>
                                <td>{{ $ke->nama_dosen }}</td>
                                <td>{{ $ke->nama_konsentrasi }}</td>
                                {{-- <td>{{ $jumlah_mahasiswa ?  $jumlah_mahasiswa->count() : 0 }} Orang</td> --}}
                                <td>
                                    <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $id }}">
                                        Update
                                    </button>
                                    <a href="/kelas/hapus/{{ $id }}" class="btn btn-sm btn-danger">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
{{-- Modal Input --}}
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="kelas/tambah" method="get">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Kode Kelas</label>
                        <input type="text" name="kode" required class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Nama Kelas</label>
                        <input type="text" name="kelas" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Pembimbing Akademik</label>
                        <select name="id_karyawan" id="" class="form-control">
                            <option value="">-- Pilih PA --</option>
                            @foreach ($dataPA as $pa)
                                <option value="{{ $pa->id }}">
                                    {{ $pa->id }} | {{ $pa->nama_dosen }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Jurusan</label>
                        <select name="id_konsentrasi" id="" class="form-control">
                            <option value="">-- Pilih Jurusan --</option>
                            @foreach ($data_konsentrasi as $k)
                                <option value="{{ $k->id_konsentrasi }}">{{ $k->id_konsentrasi }} | {{ $k->nama_konsentrasi }}</option>
                            @endforeach
                        </select>
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

{{-- Modal Update --}}
@foreach ($kelas as $ke)
    <div class="modal fade" id="exampleModal{{ $ke->id_kelas }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="kelas/edit" method="get">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="">Kode Kelas</label>
                            <input type="text" name="kode" value="{{ $ke->id_kelas }}" readonly class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Nama Kelas</label>
                            <input type="text" name="kelas" value="{{ $ke->nama_kelas }}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Jurusan</label>
                            <select name="id_konsentrasi" id="" class="form-control">
                                <option value="">-- Pilih Jurusan --</option>
                                @foreach ($data_konsentrasi as $k)
                                    <option value="{{ $k->id_konsentrasi }}" @php if($ke->id_konsentrasi == $k->id_konsentrasi) @endphp @selected(true)>
                                        {{ $k->id_konsentrasi }} | {{ $k->nama_konsentrasi }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Pembimbing Akademik</label>
                            <select name="id_karyawan" id="" class="form-control">
                                <option value="">-- Pilih PA --</option>
                                @foreach ($dataPA as $pa)
                                    <option value="{{ $pa->id }}" {{ $ke->id_karyawan == $pa->id ? 'selected' : '' }}>
                                        {{ $pa->id }} | {{ $pa->nama_dosen }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endforeach
@endsection
