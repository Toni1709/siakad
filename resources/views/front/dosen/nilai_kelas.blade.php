@extends('front.master_dosen')
@section('content')
{{-- @foreach ($kelas as $k) --}}
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-title-box">
                        <div class="btn-group float-right">
                            <ol class="breadcrumb hide-phone p-0 m-0">
                                <li class="breadcrumb-item">Tahun :</li>
                                <li class="breadcrumb-item">Bulan :</li>
                                <li class="breadcrumb-item">Semester :</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Nilai</h4>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        @if ($nilai->count() > 0)
                            <form action="/nilai/update" method="post">
                                @csrf
                                <div class="card-body new-user">
                                    <h5 class="header-title mb-4 mt-0">Nilai Kelas</h5>
                                    <div class="row">
                                        <div class="col-2">
                                            <div class="mb-0">
                                                <label for="" class="form-label">Kelas</label>
                                            </div>
                                        </div>
                                        <div class="col-10">
                                            <div class="mb-0">
                                                <label for="" class="form-label">: {{ $k->nama_kelas }}</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-2">
                                            <div class="mb-0">
                                                <label for="" class="form-label">Jurusan</label>
                                            </div>
                                        </div>
                                        <div class="col-10">
                                            <div class="mb-0">
                                                <label for="" class="form-label">: {{ $k->nama_konsentrasi }}</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-2">
                                            <div class="mb-0">
                                                <label for="" class="form-label">Dosen Pengampu</label>
                                            </div>
                                        </div>
                                        <div class="col-10">
                                            <div class="mb-0">
                                                <label for="" class="form-label">: {{ $k->nama_dosen }}</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-2">
                                            <div class="mb-0">
                                                <label for="" class="form-label">Mata Pelajaran</label>
                                            </div>
                                        </div>
                                        <div class="col-10">
                                            <div class="mb-0">
                                                <label for="" class="form-label">: {{ $k->nama_mapel }}</label>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="table-responsive">
                                        <table class="table text-center table-bordered table-hover mb-0">
                                            <thead>
                                                <tr>
                                                    <th rowspan="2">No</th>
                                                    <th rowspan="2">NIM</th>
                                                    <th rowspan="2">Nama</th>
                                                    <th colspan="7">Nilai</th>
                                                </tr>
                                                <tr>
                                                    <th class="border-top-0">Absensi</th>
                                                    <th class="border-top-0">Formatif</th>
                                                    <th class="border-top-0">Tugas</th>
                                                    <th class="border-top-0">UTS</th>
                                                    <th class="border-top-0">UAS</th>
                                                    <th class="border-top-0">Rata - Rata</th>
                                                    <th class="border-top-0">Grade</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                    @foreach ($nilai as $no => $n)
                                                        <input type="hidden" name="id_mahasiswa[{{ $no+1 }}]" value="{{ $n->id_mahasiswa }}">
                                                        @php
                                                            $data = DB::table('absensi_mahasiswa')->where('id_mahasiswa', $n->id_mahasiswa)->get();
                                                            $pertemuan = 100/14;
                                                            $jml_pertemuan = count($data);
                                                            $absensi = $jml_pertemuan * $pertemuan;
                                                        @endphp
                                                    <tr id="baris-{{ $no }}" >
                                                        <td>{{ $no+1 }}</td>
                                                        <td>{{ $n->nim }}</td>
                                                        <td>{{ $n->nama_mahasiswa }}</td>
                                                        <td><input type="text" id="absensi" name="absensi[{{ $no+1 }}]"  value="{{ substr($absensi, 0,4) }}" readonly class="form-control"></td>
                                                        <td><input type="number" id="formatif" name="formatif[{{ $no+1 }}]" value="{{ $n->formatif }}"  onkeyup="sum({{ $no }});" class="form-control"></td>
                                                        <td><input type="number" id="tugas" name="tugas[{{ $no+1 }}]" value="{{ $n->tugas }}" onkeyup="sum({{ $no }});" class="form-control"></td>
                                                        <td><input type="number" id="uts" name="uts[{{ $no+1 }}]" value="{{ $n->uts }}" onkeyup="sum({{ $no }});" class="form-control"></td>
                                                        <td><input type="number" id="uas" name="uas[{{ $no+1 }}]" value="{{ $n->uas }}" onkeyup="sum({{ $no }});"  class="form-control"></td>
                                                        <td><input type="number" id="rata" name="rata[{{ $no+1 }}]" value="{{ $n->rata_rata }}" readonly class="form-control"></td>
                                                        <td><input type="text" id="grade" name="grade[{{ $no+1 }}]" value="{{ $n->grade }}" readonly class="form-control"></td>
                                                    </tr>
                                                @endforeach
                                                <script src="{{ asset('front/assets/js/jquery.min.js') }}"></script>

                                                <script>
                                                    function sum(no) {
                                                        var a = $(`#baris-${no} #absensi`).val();
                                                        var f = $(`#baris-${no} #formatif`).val();
                                                        var t = $(`#baris-${no} #tugas`).val();
                                                        var uts = $(`#baris-${no} #uts`).val();
                                                        var uas = $(`#baris-${no} #uas`).val();

                                                        r = ((a * 1)+(f *1)+(t * 1)+(uts * 1)+(uas * 1))/5;
                                                        if (r >= 90){
                                                            n = 'A'
                                                        }else if (r >= 85) {
                                                            n = 'A-'
                                                        }else if (r >= 80){
                                                            n = 'B+'
                                                        }else if(r >= 75){
                                                            n= 'B'
                                                        }else if(r >= 70){
                                                            n = 'B-'
                                                        }else if(r >= 65){
                                                            n = 'C+'
                                                        }else if(r >= 60){
                                                            n = 'C'
                                                        }else if(r >= 55){
                                                            n = 'C-'
                                                        }else if(r >= 50){
                                                            n = 'D'
                                                        }else{
                                                            n = 'E'
                                                        }
                                                        var rata = $(`#baris-${no} #rata`).val(r);
                                                        var grade = $(`#baris-${no} #grade`).val(n);

                                                        console.log({a,f,t,uts,uas,r,n});
                                                    }
                                                </script>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="row">
                                        <div class="col-6">
                                            <a href="/absensi_kelas" class="btn btn-secondary">Kembali</a>
                                        </div>
                                        <div class="col-6" align="right">
                                            <button type="submit" class="btn btn-primary">Update</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        @else
                            <form action="/nilai/tambah" method="post">
                                @csrf
                                <div class="card-body new-user">
                                    <h5 class="header-title mb-4 mt-0">Nilai Kelas</h5>
                                    <div class="row">
                                        <div class="col-2">
                                            <div class="mb-0">
                                                <label for="" class="form-label">Kelas</label>
                                            </div>
                                        </div>
                                        <div class="col-10">
                                            <div class="mb-0">
                                                <label for="" class="form-label">: {{ $k->nama_kelas }}</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-2">
                                            <div class="mb-0">
                                                <label for="" class="form-label">Jurusan</label>
                                            </div>
                                        </div>
                                        <div class="col-10">
                                            <div class="mb-0">
                                                <label for="" class="form-label">: {{ $k->nama_konsentrasi }}</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-2">
                                            <div class="mb-0">
                                                <label for="" class="form-label">Dosen Pengampu</label>
                                            </div>
                                        </div>
                                        <div class="col-10">
                                            <div class="mb-0">
                                                <label for="" class="form-label">: {{ $k->nama_dosen }}</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-2">
                                            <div class="mb-0">
                                                <label for="" class="form-label">Mata Pelajaran</label>
                                            </div>
                                        </div>
                                        <div class="col-10">
                                            <div class="mb-0">
                                                <label for="" class="form-label">: {{ $k->nama_mapel }}</label>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="table-responsive">
                                        <table class="table text-center table-bordered table-hover mb-0">
                                            <thead>
                                                <tr>
                                                    <th rowspan="2">No</th>
                                                    <th rowspan="2">NIM</th>
                                                    <th rowspan="2">Nama</th>
                                                    <th colspan="7">Nilai</th>
                                                </tr>
                                                <tr>
                                                    <th class="border-top-0">Absensi</th>
                                                    <th class="border-top-0">Formatif</th>
                                                    <th class="border-top-0">Tugas</th>
                                                    <th class="border-top-0">UTS</th>
                                                    <th class="border-top-0">UAS</th>
                                                    <th class="border-top-0">Rata - Rata</th>
                                                    <th class="border-top-0">Grade</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                    <input type="hidden" name="semester" value="{{ $k->id_semester }}">
                                                    <input type="hidden" name="id_mapel" value="{{ $k->id_mapel }}">
                                                    <input type="hidden" name="id_kelas" value="{{ $k->id_kelas }}">
                                                    <input type="hidden" name="sks" value="{{ $k->sks }}">
                                                @foreach ($mahasiswa as $no => $m)
                                                    <input type="hidden" name="id_mahasiswa[{{ $no+1 }}]" value="{{ $m->id }}">
                                                    @php
                                                        $data = DB::table('absensi_mahasiswa')->where('id_mahasiswa', $m->id)->get();
                                                        $pertemuan = 100/14;
                                                        $jml_pertemuan = count($data);
                                                        $absensi = $jml_pertemuan * $pertemuan;
                                                    @endphp
                                                    <tr id="baris-{{ $no }}" >
                                                        <td>{{ $no+1 }}</td>
                                                        <td>{{ $m->nim }}</td>
                                                        <td>{{ $m->nama_mahasiswa }}</td>
                                                        <td><input type="text" id="absensi" name="absensi[{{ $no+1 }}]"  value="{{ substr($absensi, 0,4) }}" readonly class="form-control"></td>
                                                        <td><input type="number" id="formatif" name="formatif[{{ $no+1 }}]" onkeyup="sum({{ $no }});" class="form-control"></td>
                                                        <td><input type="number" id="tugas" name="tugas[{{ $no+1 }}]" onkeyup="sum({{ $no }});" class="form-control"></td>
                                                        <td><input type="number" id="uts" name="uts[{{ $no+1 }}]" onkeyup="sum({{ $no }});" class="form-control"></td>
                                                        <td><input type="number" id="uas" name="uas[{{ $no+1 }}]" onkeyup="sum({{ $no }});"  class="form-control"></td>
                                                        <td><input type="number" id="rata" name="rata[{{ $no+1 }}]" value="0" readonly class="form-control"></td>
                                                        <td><input type="text" id="grade" name="grade[{{ $no+1 }}]" readonly class="form-control"></td>
                                                    </tr>
                                                @endforeach
                                                <script src="{{ asset('front/assets/js/jquery.min.js') }}"></script>

                                                <script>
                                                    function sum(no) {
                                                        var a = $(`#baris-${no} #absensi`).val();
                                                        var f = $(`#baris-${no} #formatif`).val();
                                                        var t = $(`#baris-${no} #tugas`).val();
                                                        var uts = $(`#baris-${no} #uts`).val();
                                                        var uas = $(`#baris-${no} #uas`).val();

                                                        r = ((a * 1)+(f *1)+(t * 1)+(uts * 1)+(uas * 1))/5;
                                                        if (r >= 90){
                                                            n = 'A'
                                                        }else if (r >= 85) {
                                                            n = 'A-'
                                                        }else if (r >= 80){
                                                            n = 'B+'
                                                        }else if(r >= 75){
                                                            n= 'B'
                                                        }else if(r >= 70){
                                                            n = 'B-'
                                                        }else if(r >= 65){
                                                            n = 'C+'
                                                        }else if(r >= 60){
                                                            n = 'C'
                                                        }else if(r >= 55){
                                                            n = 'C-'
                                                        }else if(r >= 50){
                                                            n = 'D'
                                                        }else{
                                                            n = 'E'
                                                        }
                                                        var rata = $(`#baris-${no} #rata`).val(r);
                                                        var grade = $(`#baris-${no} #grade`).val(n);

                                                        console.log({a,f,t,uts,uas,r,n});
                                                    }
                                                </script>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="row">
                                        <div class="col-6">
                                            <a href="/absensi_kelas" class="btn btn-secondary">Kembali</a>
                                        </div>
                                        <div class="col-6" align="right">
                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
   {{-- @endforeach --}}
@endsection
