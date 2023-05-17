@extends('front.master_mahasiswa')
@section('content')
<div class="page-breadcrumb d-flex d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-1">Home</div>
    <div class="ps-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
                <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Nilai</li>
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
                <div class="border rounded p-4">
                    <table id="example2" class="table mb-0">
                        <thead>
                            <tr>
                                <th class="border-top-0">No</th>
                                <th class="border-top-0">Mata Kuliah</th>
                                <th class="border-top-0">Smt</th>
                                <th class="border-top-0">SKS</th>
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
                                @php
                                    $absensi = DB::table('absensi_mahasiswa')->where('id_mahasiswa', $n->id_mahasiswa)->get();
                                    $total_absensi = count($absensi);
                                    $n_pertemuan = 100/14;

                                    $nilai_absensi = $total_absensi * $n_pertemuan;
                                    $formatif = $n->rata_rata;
                                    $tugas = $n->tugas;
                                    $uts = $n->uts;
                                    $uas = $n->uas;
                                    $rata2 = ($nilai_absensi + $formatif + $tugas + $uts + $uas)/5;
                                    if ($rata2 >= 90){
                                        $grade = 'A';
                                    }else if ($rata2 >= 85) {
                                        $grade = 'A-';
                                    }else if ($rata2 >= 80){
                                        $grade = 'B+';
                                    }else if($rata2 >= 75){
                                        $grade = 'B';
                                    }else if($rata2 >= 70){
                                        $grade = 'B-';
                                    }else if($rata2 >= 65){
                                        $grade = 'C+';
                                    }else if($rata2 >= 60){
                                        $grade = 'C';
                                    }else if($rata2 >= 55){
                                        $grade = 'C-';
                                    }else if($rata2 >= 50){
                                        $grade = 'D';
                                    }else{
                                        $grade = 'E';
                                    }
                                @endphp
                                <tr>
                                    <td>{{ $no+1 }}</td>
                                    <td>{{ $n->nama_mapel }}</td>
                                    <td>{{ $n->semester }}</td>
                                    <td>{{ $n->sks }}</td>
                                    <td>{{ substr($nilai_absensi, 0, 4) }}</td>
                                    <td>{{ $n->formatif }}</td>
                                    <td>{{ $n->tugas }}</td>
                                    <td>{{ $n->uts }}</td>
                                    <td>{{ $n->uas }}</td>
                                    <td>{{ substr($rata2, 0, 4) }}</td>
                                    <td>{{ $grade }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
