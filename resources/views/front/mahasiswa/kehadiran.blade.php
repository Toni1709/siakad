@extends('front.master_mahasiswa')
@section('content')
<div class="page-breadcrumb d-flex d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-1">Home</div>
    <div class="ps-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
                <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Kehadiran</li>
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
                <h4 class="mt-0 header-title">
                    <div class="row">
                        <div class="col-lg-3 col-7 d-flex mb-3">
                            <select name="id" id="semester" class="form-control form-control-sm">
                                <option value="" disabled selected>Pilih Semester</option>
                                @foreach ($semester as $s)
                                    <option value="{{ $s->id_semester }}">Semester {{ $s->semester }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-lg-1 col-3 mb-3">
                            <a href="/kehadiran" class="btn btn-sm btn-secondary">Refresh</a>
                        </div>
                        <div class="col-lg-2 col-12">
                            @if ($status_absensi == null)
                                <button disabled type="button" class="btn btn-sm btn-secondary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    Absensi Non AKtif
                                </button>
                            @else
                                <button type="button" class="btn btn-sm btn-secondary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    Ambil Absensi
                                </button>
                            @endif
                        </div>
                    </div>
                </h4>
                <hr>
                <div class="border p-4 rounded">
                    <div id="kehadiran" class=" table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Mata Kuliah</th>
                                    @for ($i = 1; $i <= 14; $i++)
                                        <th>P{{ $i }}</th>
                                    @endfor
                                    <th>UTS</th>
                                    <th>UAS</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($jadwal as $no => $j)
                                    @php
                                        $absen = DB::table('absensi_mahasiswa')
                                            ->where('id_mapel', $j->id_mapel)
                                            ->where('id_mahasiswa', Auth::user()->id)
                                            ->get();
                                    @endphp
                                    <tr>
                                        <td>{{ $no+1 }}</td>
                                        <td>{{ $j->nama_mapel }}</td>
                                        @foreach ($absen as $a)
                                            <td>{{ $a->kehadiran }}</td>
                                        @endforeach
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- modal absensi --}}
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content bg-primary">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="">
                    <div class=" d-flex flex-column align-items-center justify-content-center p-24pt">
                        <div class="mb-24pt d-inline-flex flex-column text-center">
                            <i class="lni lni-chevron-left-circle"></i>
                            <div class="d-flex align-items-center">
                                <h2 class="m-0">
                                    <span id="jam"></span> : <span id="menit"></span> : <span id="detik"></span>
                                </h2>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <a href="/absensi/mahasiswa/checkin/{{ Auth::user()->id }}" class="btn btn-light mb-16pt">CheckIn</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('backend/js/jquery.min.js') }}"></script>
<script>
    $(document).ready(function () {
        $('#semester').change(function (e) {
            $('#kehadiran').load("{{ route('kehadiran') }}/"+e.target.value);
        });
    });

    window.setTimeout("waktu()", 1000);

    function waktu() {
        var waktu = new Date();
        setTimeout("waktu()", 1000);
        document.getElementById("jam").innerHTML = waktu.getHours();
        document.getElementById("menit").innerHTML = waktu.getMinutes();
        document.getElementById("detik").innerHTML = waktu.getSeconds();
    }
</script>
@endsection
