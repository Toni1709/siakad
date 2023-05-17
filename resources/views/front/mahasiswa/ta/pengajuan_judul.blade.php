@extends('front.master_mahasiswa')
@section('content')
    @include('front.mahasiswa.ta.widget')
    @if ($judul == null)
        <div class="row">
            <div class="col-xl-10 mx-auto">
                <div class="card border-top border-0 border-4 border-white">
                    <div class="card-body">
                        <div class="border p-4 rounded">
                            <div class="card-title d-flex align-items-center">
                                <div><i class="bx bxs-user me-1 font-22 text-white"></i>
                                </div>
                                <h5 class="mb-0 text-white">Form Pengajuan Judul</h5>
                            </div>
                            <hr/>
                            <form action="/ta/pengajuan_judul/ajukan" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row mb-2">
                                    <div class="col-lg-12">
                                        <div class="row mb-2">
                                            <div class="col-sm-6 mb-2">
                                                <label for="" class="col-form-label">NIM</label>
                                                <input type="hidden" name="id" value="{{ $data->id }}">
                                                <input type="text" name="" value="{{ $data->nim }}" readonly class="form-control">
                                            </div>
                                            <div class="col-sm-6 mb-2">
                                                <label for="" class="col-form-label">Nama</label>
                                                <input type="text" name="" value="{{ $data->nama_mahasiswa }}" readonly class="form-control">
                                            </div>
                                            <div class="col-sm-12 mb-2">
                                                <label for="" class="col-form-label">Judul</label>
                                                <textarea name="judul" rows="2" class="form-control"></textarea>
                                            </div>
                                            <div class="col-sm-4 mb-2">
                                                <label for="" class="col-form-label">Pembimbing</label>
                                                <select name="pembimbing1" id="" class="single-select">
                                                    <option value="">-- Pilih Pembimbing --</option>
                                                    @foreach ($dosen as $no => $d)
                                                        <option value="{{ $d->id }}">{{ $d->nama_dosen }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-sm-4 mb-2">
                                                <label for="" class="col-form-label">File TA</label>
                                                <input type="file" name="file" class="form-control">
                                            </div>
                                            <div class="col-sm-4 mb-2">
                                                <label for="" class="col-form-label">Foto</label>
                                                <input type="file" name="foto" class="form-control">
                                            </div>
                                            <div class="col-sm-12 mb-2 mt-3" align="center">
                                                @if ($tagihan->tagihan <= 0)
                                                    <button type="submit" class="btn btn-light">Ajukan Judul</button>
                                                @else
                                                    <button type="submit" class="btn disabled btn-light">Ajukan Judul</button>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @else
        @if ($judul->status_ta == 'ACC')
            <div class="row">
                <div class="col-xl-10 mx-auto">
                    <div class="card">
                        <div class="card-header">
                            <p class="card-title">Proposal Pengajuan Tugas Akhir</p>
                        </div>
                        <div class="card-body">
                            <div class="border p-4">
                                <div class="row mb-2">
                                    <div class="col-lg-4">
                                        <div class="">
                                            <img src="{{ asset('berkas/foto_ta/'.$judul->foto_ta) }}" alt="" style="width:100%; border-radius: 10px;">
                                            <div class="text-center mt-3">
                                                <button type="button" class="btn btn-sm btn-light mb-3 mb-lg-0" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $judul->id_ta }}">
                                                    Lihat TA
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="row mb-2">
                                            <div class="col-sm-12">
                                                <label for="" class="col-form-label">NIM</label>
                                                <input type="text" name="" value="{{ $judul->nim }}" readonly class="form-control">
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-sm-12">
                                                <label for="" class="col-form-label">Nama</label>
                                                <input type="text" name="" value="{{ $judul->nama_mahasiswa }}" readonly class="form-control">
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-sm-12">
                                                <label for="" class="col-form-label">Judul</label>
                                                <textarea name="" rows="2" class="form-control" readonly>{{ $judul->judul }}</textarea>
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-sm-12">
                                                <label for="" class="col-form-label">Pembimbing</label>
                                                <input type="text" name="" value="{{ $judul->nama_dosen }}" readonly class="form-control">
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-sm-12">
                                                <label for="" class="col-form-label">No. Telp. Pembimbing</label>
                                                <input type="text" name="" value="{{ $judul->no_telp_dosen }}" readonly class="form-control">
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-sm-12">
                                                <label for="" class="col-form-label">Catatan</label>
                                                <textarea name="" rows="2" class="form-control" readonly>{{ $judul->catatan }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="row mt-3">
                                            <div class="col-sm-12 text-center">
                                                <button type="button" class="btn btn-sm btn-light mb-3 mb-lg-0" data-bs-toggle="modal" data-bs-target="#edit{{ $judul->id_ta }}">
                                                    Update Judul
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <div class="row">
                <div class="col-xl-10 mx-auto">
                    <div class="card border-top border-0 border-4 border-white">
                        <div class="card-body">
                            <div class="border p-4 rounded">
                                <div class="card-title d-flex align-items-center">
                                    <div><i class="bx bxs-user me-1 font-22 text-white"></i>
                                    </div>
                                    <h5 class="mb-0 text-white">Form Pengajuan Judul</h5>
                                </div>
                                <hr/>
                                <form action="/ta/pengajuan_judul/edit" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row mb-2">
                                        <div class="col-lg-12">
                                            <div class="row mb-2">
                                                <div class="col-sm-6 mb-2">
                                                    <label for="" class="col-form-label">NIM</label>
                                                    <input type="hidden" name="id" value="{{ $judul->id_ta }}">
                                                    <input type="text" name="" value="{{ $data->nim }}" readonly class="form-control">
                                                </div>
                                                <div class="col-sm-6 mb-2">
                                                    <label for="" class="col-form-label">Nama</label>
                                                    <input type="text" name="" value="{{ $data->nama_mahasiswa }}" readonly class="form-control">
                                                </div>
                                                <div class="col-sm-12 mb-2">
                                                    <label for="" class="col-form-label">Judul</label>
                                                    <textarea name="judul" rows="2" class="form-control"></textarea>
                                                </div>
                                                <div class="col-sm-4 mb-2">
                                                    <label for="" class="col-form-label">Pembimbing</label>
                                                    <select name="pembimbing1" id="" class="single-select">
                                                        <option value="">-- Pilih Pembimbing --</option>
                                                        @foreach ($dosen as $no => $d)
                                                            <option value="{{ $d->id }}">{{ $d->nama_dosen }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-sm-4 mb-2">
                                                    <label for="" class="col-form-label">File TA</label>
                                                    <input type="file" name="file" class="form-control">
                                                </div>
                                                <div class="col-sm-4 mb-2">
                                                    <label for="" class="col-form-label">Foto</label>
                                                    <input type="file" name="foto" class="form-control">
                                                </div>
                                                <div class="col-sm-12 mb-2 mt-3" align="center">
                                                    @if ($judul->status_ta == 'Menunggu Verifikasi')
                                                        <button type="submit" class="btn disabled btn-light">Ajukan Judul</button>
                                                    @else
                                                        <button type="submit" class="btn btn-light">Ajukan Judul</button>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
         {{-- Modal Lihat TA --}}
        <div class="modal fade" id="exampleModal{{ $judul->id_ta }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <object data="{{ asset('berkas/pengajuan_ta/'.$judul->file) }}" type="application/pdf" style="width:100%; height: 12cm;"></object>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        {{-- Modal Edit Judul --}}
        <div class="modal fade" id="edit{{ $judul->id_ta }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="/ta/edit/judul" method="post">
                        @csrf
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="">Kode Gedung</label>
                                <input type="hidden" name="id" value="{{ $judul->id_ta }}">
                                <textarea name="judul" rows="3" class="form-control">{{ $judul->judul }}</textarea>
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
    @endif
@endsection
