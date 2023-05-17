@extends('front.master_mahasiswa')
@section('content')
    <!--breadcrumb-->
    <div class="page-breadcrumb d-flex d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-1">Home</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Biodata</li>
                </ol>
            </nav>
        </div>
    </div>
    <!--end breadcrumb-->
    <div class="container-fluid">
        <div class="main-body">
            @if ($message = Session::get('gagal'))
                <div class="row">
                    <div class="col-lg-12">
                        <div class="alert border-0 alert-dismissible fade show py-2">
                            <div class="d-flex align-items-center">
                                <div class="font-35 text-white"><i class='bx bx-info-circle'></i>
                                </div>
                                <div class="ms-3">
                                    <h6 class="mb-0 text-white">Gagal!</h6>
                                    <div class="text-white">{{ $message }}</div>
                                </div>
                            </div>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    </div>
                </div>
            @elseif ($message = Session::get('berhasil'))
                <div class="alert border-0 alert-dismissible fade show py-2">
                    <div class="d-flex align-items-center">
                        <div class="font-35 text-white"><i class='bx bxs-check-circle'></i>
                        </div>
                        <div class="ms-3">
                            <h6 class="mb-0 text-white">Berhasil</h6>
                            <div class="text-white">{{ $message }}</div>
                        </div>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="row">
                <div class="col-lg-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="border p-4 rounded">
                                <div class="d-flex flex-column align-items-center text-center">
                                    @if ($biodata)
                                        <img src="{{ asset('berkas/profil/'.$biodata->foto) }}" alt="Admin" class="rounded-circle p-1 bg-primary" width="110">
                                    @else
                                        <img src="{{ asset('backend/images/avatars/avatar-2.png') }}" alt="Admin" class="rounded-circle p-1 bg-primary" width="110">
                                    @endif
                                    <div class="mt-3">
                                        <h4>{{ $biodata->nama_mahasiswa }}</h4>
                                        <p class="mb-1">{{ $biodata->nim }}</p>
                                    </div>
                                </div>
                                <hr class="my-4" />
                                <div class="mt-3">
                                    <p class="text-center">
                                        <strong>{{ $biodata->nama_prodi }}</strong>
                                        <br>
                                        <span>{{ $biodata->nama_konsentrasi }}</span>
                                    </p>
                                </div>
                                <hr class="my-4">
                                <div class="mt-3" align="center">
                                    <button type="button" class="btn btn-sm btn-light mb-3 mb-lg-0" data-bs-toggle="modal" data-bs-target="#perbaruifoto">
                                        <i class='bx bxs-camera' ></i>
                                        Perbarui Foto
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="card">
                        <div class="card-body">
                            <div class="border p-4 rounded">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="row mb-3">
                                            <div class="col-sm-6">
                                                <h6 class="mb-2">
                                                    <i class='bx bx-user'></i>
                                                    Nama
                                                </h6>
                                            </div>
                                            <div class="col-sm-6">
                                                <p class="mb-2">{{ $biodata->nama_mahasiswa }}</p>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-sm-6">
                                                <h6 class="mb-2">
                                                    <i class='bx bx-user'></i>
                                                    Nik
                                                </h6>
                                            </div>
                                            <div class="col-sm-6">
                                                <p class="mb-2">{{ $biodata->nik }}</p>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-sm-6">
                                                <h6 class="mb-2">
                                                    <i class='bx bx-calendar'></i>
                                                    TTL
                                                </h6>
                                            </div>
                                            <div class="col-sm-6">
                                                <p class="mb-2">{{ $biodata->tempat_lahir }}, {{ $biodata->tgl_lahir }}</p>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-sm-6">
                                                <h6 class="mb-2">
                                                    <i class='bx bx-current-location'></i>
                                                    Alamat
                                                </h6>
                                            </div>
                                            <div class="col-sm-6">
                                                <p class="mb-2">{{ $biodata->alamat }}</p>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-sm-6">
                                                <h6 class="mb-2">
                                                    <i class='bx bx-current-location'></i>
                                                    Kota
                                                </h6>
                                            </div>
                                            <div class="col-sm-6">
                                                <p class="mb-2">{{ $biodata->kabupaten }}, {{ $biodata->provinsi }}</p>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-sm-6">
                                                <h6 class="mb-2">
                                                    <i class='bx bx-phone'></i>
                                                    No. Telp / Hp
                                                </h6>
                                            </div>
                                            <div class="col-sm-6">
                                                <p class="mb-2">{{ $biodata->no_telp }}/{{ $biodata->no_hp }}</p>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-sm-6">
                                                <h6 class="mb-2">
                                                    <i class='bx bx-envelope'></i>
                                                    Email
                                                </h6>
                                            </div>
                                            <div class="col-sm-6">
                                                <p class="mb-2">{{ $biodata->email }}</p>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-sm-6">
                                                <h6 class="mb-2">
                                                    <i class='bx bx-envelope'></i>
                                                    Email PLB
                                                </h6>
                                            </div>
                                            <div class="col-sm-6">
                                                <p class="mb-2">{{ $biodata->email_plb }}</p>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-sm-6">
                                                <h6 class="mb-2">
                                                    <i class='bx bx-envelope'></i>
                                                    No VA
                                                </h6>
                                            </div>
                                            <div class="col-sm-6">
                                                <p class="mb-0">{{ $biodata->no_va }}</p>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-sm-6">
                                                <h6 class="mb-2">
                                                    <i class='bx bxs-school'></i>
                                                    Asal Sekolah
                                                </h6>
                                            </div>
                                            <div class="col-sm-6">
                                                <p class="mb-2">{{ $biodata->asal_sekolah }}</p>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-sm-6">
                                                <h6 class="mb-2">
                                                    <i class='bx bx-building'></i>
                                                    Jurusan
                                                </h6>
                                            </div>
                                            <div class="col-sm-6">
                                                <p class="mb-2">{{ $biodata->jurusan }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row mb-3">
                                            <div class="col-sm-6">
                                                <h6 class="mb-2">
                                                    <i class='bx bx-circle' ></i>
                                                    Jenis Kelamin
                                                </h6>
                                            </div>
                                            <div class="col-sm-6">
                                                <p class="mb-2">{{ $biodata->jk }}</p>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-sm-6">
                                                <h6 class="mb-2">
                                                    <i class='bx bx-bookmarks' ></i>
                                                    Agama
                                                </h6>
                                            </div>
                                            <div class="col-sm-6">
                                                <p class="mb-2">{{ $biodata->agama }}</p>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-sm-6">
                                                <h6 class="mb-2">
                                                    <i class='bx bxs-circle'></i>
                                                    Golongan Darah
                                                </h6>
                                            </div>
                                            <div class="col-sm-6">
                                                <p class="mb-2">{{ $biodata->gol_darah }}</p>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-sm-6">
                                                <h6 class="mb-2">
                                                    <i class='bx bx-user-pin' ></i>
                                                    Status Menikah
                                                </h6>
                                            </div>
                                            <div class="col-sm-6">
                                                <p class="mb-2">{{ $biodata->status_kawin }}</p>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-sm-6">
                                                <h6 class="mb-2">
                                                    <i class='bx bx-cog' ></i>
                                                    Warga Negara
                                                </h6>
                                            </div>
                                            <div class="col-sm-6">
                                                <p class="mb-2">{{ $biodata->warga_negara }}</p>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-sm-6">
                                                <h6 class="mb-2">
                                                    <i class='bx bx-user'></i>
                                                    Nama Ibu
                                                </h6>
                                            </div>
                                            <div class="col-sm-6">
                                                <p class="mb-2">{{ $biodata->nama_ibu }}</p>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-sm-6">
                                                <h6 class="mb-2">
                                                    <i class='bx bx-phone'></i>
                                                    Telp. Orang Tua
                                                </h6>
                                            </div>
                                            <div class="col-sm-6">
                                                <p class="mb-0">{{ $biodata->telp_ortu }}</p>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-sm-6">
                                                <h6 class="mb-2">
                                                    <i class='bx bx-user'></i>
                                                    Dosen PA
                                                </h6>
                                            </div>
                                            <div class="col-sm-6">
                                                <p class="mb-2">{{ $biodata->nama_dosen }}</p>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-sm-6">
                                                <h6 class="mb-2">
                                                    <i class='bx bx-phone'></i>
                                                    Telp. Dosen PA
                                                </h6>
                                            </div>
                                            <div class="col-sm-6">
                                                <p class="mb-2">{{ $biodata->no_telp_dosen }}</p>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-sm-6">
                                                <h6 class="mb-2">
                                                    <i class='bx bx-user-pin' ></i>
                                                    Status
                                                </h6>
                                            </div>
                                            <div class="col-sm-6">
                                                <p class="mb-2">{{ $biodata->status }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="row">
                                <div class="col-sm-6 col-6">
                                    <a href="/biodata/edit" class="btn btn-sm btn-light mb-3 mb-lg-0">
                                        <i class='bx bxs-edit' ></i>
                                        Update Profil
                                    </a>
                                </div>
                                <div class="col-sm-6 col-6" align="right">
                                    <button type="button" class="btn btn-sm btn-light mb-3 mb-lg-0" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                        <i class='bx bxs-edit'></i>
                                        Update Pass.
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- Modal Edit Password --}}
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="/biodata/edit/password" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="row g-3">
                            <div class="col-lg-12 col-md-12">
                                <label for="">Password Lama</label>
                                <input type="text" name="lama" class="form-control">
                            </div>
                            <div class="col-lg-12 col-md-12">
                                <label for="">Password Baru</label>
                                <input type="text" name="baru" class="form-control">
                            </div>
                            <div class="col-lg-12 col-md-12">
                                <label for="">Konfirmasi Password Baru</label>
                                <input type="text" name="konfirmasi" class="form-control">
                            </div>
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
    {{-- Modal Perbarui Foto --}}
    <div class="modal fade" id="perbaruifoto" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="/biodata/edit/foto" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="row g-3">
                            <div class="col-lg-12 col-md-12">
                                <label for="">Foto</label>
                                <input type="file" name="foto" class="form-control">
                                <sup>*Foto harus png,jpg,jpeg</sup>
                            </div>
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
@endsection
