<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Keuangan;
use App\Models\Mahasiswa;
use App\Models\NonPendidikan;
use App\Models\PengajuanPembayaran;
use App\Models\TahunAkademik;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\RequestStack;

class KeuanganController extends Controller
{
    // ======================================================================================//
    // View
    public function MasterTagihan(){
        $data['tahun'] = TahunAkademik::all();
        $data['uang'] = Keuangan::uangsemester();
        return view('admin.keuangan.master_tagihan', $data);
    }
    public function PengajuanPembayaran(){
        $data['pengajuan'] = PengajuanPembayaran::PengajuanPembayaran2();
        return view('admin.keuangan.pengajuan_pembayaran', $data);
    }
    public function Kelas(){
        $data['kelas'] = Kelas::DataKelas();
        return view('admin.keuangan.kelas', $data);
    }
    public function DataKelas($id){
        $data['mahasiswa'] = Kelas::DataMahasiswa($id);
        return view('admin.keuangan.data_kelas', $data);
    }
    public function Tagihan($id){
        $data['tagihan'] = Keuangan::tagihanmahasiswa($id);
        // dd($data['tagihan']);
        return view('admin.keuangan.detail_tagihan', $data);
    }
    public function NonPendidikan(){
        $data['biaya'] =  NonPendidikan::BiayaNonPendidikan();
        return view('admin.keuangan.biaya_nonpendidikan', $data);
    }
    public function FormTambahNonPendidikan(){
        $data['mahasiswa'] = Mahasiswa::MahasiswaKeuangan();
        return view('admin.keuangan.form.biaya_nonpendidikan', $data);
    }
    // ======================================================================================//
    // ======================================================================================//
    // Input
    public function TambahMasterTagihan(Request $r){
        $spp = DB::table('uang_semester')->insert([
                'angkatan' => $r->angkatan,
                'id_tahun_akademik' => $r->tahun_ajaran,
                'uang_semester' => $r->uang
            ]);

        if($spp){
            $date = $r->tgl;
            $tgl = date('d', strtotime($date));
            $bln = date('m', strtotime($date));
            $thn = date('Y', strtotime($date));
            $tagihan = ($r->uang)/6;
            for($i = 1; $i <= 12; $i++){
                if($i == 1){
                    if($bln == 01){
                        $bulan = 01;
                        $tahun = $thn;
                    }elseif($bln == 02){
                        $bulan = 02;
                        $tahun = $thn;
                    }elseif($bln == 03){
                        $bulan = 03;
                        $tahun = $thn;
                    }elseif($bln == 04){
                        $bulan = 04;
                        $tahun = $thn;
                    }elseif($bln == 05){
                        $bulan = 05;
                        $tahun = $thn;
                    }elseif($bln == 06){
                        $bulan = 06;
                        $tahun = $thn;
                    }elseif($bln == 07){
                        $bulan = 07;
                        $tahun = $thn;
                    }elseif($bln == 8){
                        $bulan = 8;
                        $tahun = $thn;
                    }elseif($bln == 9){
                        $bulan = 9;
                        $tahun = $thn;
                    }elseif($bln == 10){
                        $bulan = 10;
                        $tahun = $thn;
                    }elseif($bln == 11){
                        $bulan = 11;
                        $tahun = $thn;
                    }elseif($bln == 12){
                        $bulan = 12;
                        $tahun = $thn;
                    }
                }elseif($i == 2){
                    if($bln+1 == 01 || $bln+1 == 13){
                        $bulan = 01;
                        if($bln+1 == 13){
                            $tahun = $thn+1;
                        }else{
                            $tahun = $thn;
                        }
                    }elseif($bln+1 == 02 || $bln+1 == 14){
                        $bulan = 02;
                        if($bln+1 == 14){
                            $tahun = $thn+1;
                        }else{
                            $tahun = $thn;
                        }
                    }elseif($bln+1 == 03 || $bln+1 == 15){
                        $bulan = 03;
                        if($bln+1 == 15){
                            $tahun = $thn+1;
                        }else{
                            $tahun = $thn;
                        }
                    }elseif($bln+1 == 04 || $bln+1 == 16){
                        $bulan = 04;
                        if($bln+1 == 16){
                            $tahun = $thn+1;
                        }else{
                            $tahun = $thn;
                        }
                    }elseif($bln+1 == 05 || $bln+1 == 17){
                        $bulan = 05;
                        if($bln+1 == 17){
                            $tahun = $thn+1;
                        }else{
                            $tahun = $thn;
                        }
                    }elseif($bln+1 == 06 || $bln+1 == 18){
                        $bulan = 06;
                        if($bln+1 == 18){
                            $tahun = $thn+1;
                        }else{
                            $tahun = $thn;
                        }
                    }elseif($bln+1 == 07 || $bln+1 == 19){
                        $bulan = 07;
                        if($bln+1 == 19){
                            $tahun = $thn+1;
                        }else{
                            $tahun = $thn;
                        }
                    }elseif($bln+1 == 8 || $bln+1 == 20){
                        $bulan = 8;
                        if($bln+1 == 20){
                            $tahun = $thn+1;
                        }else{
                            $tahun = $thn;
                        }
                    }elseif($bln+1 == 9 || $bln+1 == 21){
                        $bulan = 9;
                        if($bln+1 == 21){
                            $tahun = $thn+1;
                        }else{
                            $tahun = $thn;
                        }
                    }elseif($bln+1 == 10 || $bln+1 == 22){
                        $bulan = 10;
                        if($bln+1 == 22){
                            $tahun = $thn+1;
                        }else{
                            $tahun = $thn;
                        }
                    }elseif($bln+1 == 11 || $bln+1 == 23){
                        $bulan = 11;
                        if($bln+1 == 23){
                            $tahun = $thn+1;
                        }else{
                            $tahun = $thn;
                        }
                    }elseif($bln+1 == 12 || $bln+1 == 24){
                        $bulan = 12;
                        if($bln+1 == 24){
                            $tahun = $thn+1;
                        }else{
                            $tahun = $thn;
                        }
                    }
                }elseif($i == 3){
                    if($bln+2 == 01 || $bln+2 == 13){
                        $bulan = 01;
                        if($bln+2 == 13){
                            $tahun = $thn+1;
                        }else{
                            $tahun = $thn;
                        }
                    }elseif($bln+2 == 02 || $bln+2 == 14){
                        $bulan = 02;
                        if($bln+2 == 14){
                            $tahun = $thn+1;
                        }else{
                            $tahun = $thn;
                        }
                    }elseif($bln+2 == 03 || $bln+2 == 15){
                        $bulan = 03;
                        if($bln+2 == 15){
                            $tahun = $thn+1;
                        }else{
                            $tahun = $thn;
                        }
                    }elseif($bln+2 == 04 || $bln+2 == 16){
                        $bulan = 04;
                        if($bln+2 == 16){
                            $tahun = $thn+1;
                        }else{
                            $tahun = $thn;
                        }
                    }elseif($bln+2 == 05 || $bln+2 == 17){
                        $bulan = 05;
                        if($bln+2 == 17){
                            $tahun = $thn+1;
                        }else{
                            $tahun = $thn;
                        }
                    }elseif($bln+2 == 06 || $bln+2 == 18){
                        $bulan = 06;
                        if($bln+2 == 18){
                            $tahun = $thn+1;
                        }else{
                            $tahun = $thn;
                        }
                    }elseif($bln+2 == 07 || $bln+2 == 19){
                        $bulan = 07;
                        if($bln+2 == 19){
                            $tahun = $thn+1;
                        }else{
                            $tahun = $thn;
                        }
                    }elseif($bln+2 == 8 || $bln+2 == 20){
                        $bulan = 8;
                        if($bln+2 == 20){
                            $tahun = $thn+1;
                        }else{
                            $tahun = $thn;
                        }
                    }elseif($bln+2 == 9 || $bln+2 == 21){
                        $bulan = 9;
                        if($bln+2 == 21){
                            $tahun = $thn+1;
                        }else{
                            $tahun = $thn;
                        }
                    }elseif($bln+2 == 10 || $bln+2 == 22){
                        $bulan = 10;
                        if($bln+2 == 22){
                            $tahun = $thn+1;
                        }else{
                            $tahun = $thn;
                        }
                    }elseif($bln+2 == 11 || $bln+2 == 23){
                        $bulan = 11;
                        if($bln+2 == 23){
                            $tahun = $thn+1;
                        }else{
                            $tahun = $thn;
                        }
                    }elseif($bln+2 == 12 || $bln+2 == 24){
                        $bulan = 12;
                        if($bln+2 == 24){
                            $tahun = $thn+1;
                        }else{
                            $tahun = $thn;
                        }
                    }
                }elseif($i == 4){
                    if($bln+3 == 01 || $bln+3 == 13){
                        $bulan = 01;
                        if($bln+3 == 13){
                            $tahun = $thn+1;
                        }else{
                            $tahun = $thn;
                        }
                    }elseif($bln+3 == 02 || $bln+3 == 14){
                        $bulan = 02;
                        if($bln+3 == 14){
                            $tahun = $thn+1;
                        }else{
                            $tahun = $thn;
                        }
                    }elseif($bln+3 == 03 || $bln+3 == 15){
                        $bulan = 03;
                        if($bln+3 == 15){
                            $tahun = $thn+1;
                        }else{
                            $tahun = $thn;
                        }
                    }elseif($bln+3 == 04 || $bln+3 == 16){
                        $bulan = 04;
                        if($bln+3 == 16){
                            $tahun = $thn+1;
                        }else{
                            $tahun = $thn;
                        }
                    }elseif($bln+3 == 05 || $bln+3 == 17){
                        $bulan = 05;
                        if($bln+3 == 17){
                            $tahun = $thn+1;
                        }else{
                            $tahun = $thn;
                        }
                    }elseif($bln+3 == 06 || $bln+3 == 18){
                        $bulan = 06;
                        if($bln+3 == 18){
                            $tahun = $thn+1;
                        }else{
                            $tahun = $thn;
                        }
                    }elseif($bln+3 == 07 || $bln+3 == 19){
                        $bulan = 07;
                        if($bln+3 == 19){
                            $tahun = $thn+1;
                        }else{
                            $tahun = $thn;
                        }
                    }elseif($bln+3 == 8 || $bln+3 == 20){
                        $bulan = 8;
                        if($bln+3 == 20){
                            $tahun = $thn+1;
                        }else{
                            $tahun = $thn;
                        }
                    }elseif($bln+3 == 9 || $bln+3 == 21){
                        $bulan = 9;
                        if($bln+3 == 21){
                            $tahun = $thn+1;
                        }else{
                            $tahun = $thn;
                        }
                    }elseif($bln+3 == 10 || $bln+3 == 22){
                        $bulan = 10;
                        if($bln+3 == 22){
                            $tahun = $thn+1;
                        }else{
                            $tahun = $thn;
                        }
                    }elseif($bln+3 == 11 || $bln+3 == 23){
                        $bulan = 11;
                        if($bln+3 == 23){
                            $tahun = $thn+1;
                        }else{
                            $tahun = $thn;
                        }
                    }elseif($bln+3 == 12 || $bln+3 == 24){
                        $bulan = 12;
                        if($bln+3 == 24){
                            $tahun = $thn+1;
                        }else{
                            $tahun = $thn;
                        }
                    }
                }elseif($i == 5){
                    if($bln+4 == 01 || $bln+4 == 13){
                        $bulan = 01;
                        if($bln+4 == 13){
                            $tahun = $thn+1;
                        }else{
                            $tahun = $thn;
                        }
                    }elseif($bln+4 == 02 || $bln+4 == 14){
                        $bulan = 02;
                        if($bln+4 == 14){
                            $tahun = $thn+1;
                        }else{
                            $tahun = $thn;
                        }
                    }elseif($bln+4 == 03 || $bln+4 == 15){
                        $bulan = 03;
                        if($bln+4 == 15){
                            $tahun = $thn+1;
                        }else{
                            $tahun = $thn;
                        }
                    }elseif($bln+4 == 04 || $bln+4 == 16){
                        $bulan = 04;
                        if($bln+4 == 16){
                            $tahun = $thn+1;
                        }else{
                            $tahun = $thn;
                        }
                    }elseif($bln+4 == 05 || $bln+4 == 17){
                        $bulan = 05;
                        if($bln+4 == 17){
                            $tahun = $thn+1;
                        }else{
                            $tahun = $thn;
                        }
                    }elseif($bln+4 == 06 || $bln+4 == 18){
                        $bulan = 06;
                        if($bln+4 == 18){
                            $tahun = $thn+1;
                        }else{
                            $tahun = $thn;
                        }
                    }elseif($bln+4 == 07 || $bln+4 == 19){
                        $bulan = 07;
                        if($bln+4 == 19){
                            $tahun = $thn+1;
                        }else{
                            $tahun = $thn;
                        }
                    }elseif($bln+4 == 8 || $bln+4 == 20){
                        $bulan = 8;
                        if($bln+4 == 20){
                            $tahun = $thn+1;
                        }else{
                            $tahun = $thn;
                        }
                    }elseif($bln+4 == 9 || $bln+4 == 21){
                        $bulan = 9;
                        if($bln+4 == 21){
                            $tahun = $thn+1;
                        }else{
                            $tahun = $thn;
                        }
                    }elseif($bln+4 == 10 || $bln+4 == 22){
                        $bulan = 10;
                        if($bln+4 == 22){
                            $tahun = $thn+1;
                        }else{
                            $tahun = $thn;
                        }
                    }elseif($bln+4 == 11 || $bln+4 == 23){
                        $bulan = 11;
                        if($bln+4 == 23){
                            $tahun = $thn+1;
                        }else{
                            $tahun = $thn;
                        }
                    }elseif($bln+4 == 12 || $bln+4 == 24){
                        $bulan = 12;
                        if($bln+4 == 24){
                            $tahun = $thn+1;
                        }else{
                            $tahun = $thn;
                        }
                    }
                }elseif($i == 6){
                    if($bln+5 == 01 || $bln+5 == 13){
                        $bulan = 01;
                        if($bln+5 == 13){
                            $tahun = $thn+1;
                        }else{
                            $tahun = $thn;
                        }
                    }elseif($bln+5 == 02 || $bln+5 == 14){
                        $bulan = 02;
                        if($bln+5 == 14){
                            $tahun = $thn+1;
                        }else{
                            $tahun = $thn;
                        }
                    }elseif($bln+5 == 03 || $bln+5 == 15){
                        $bulan = 03;
                        if($bln+5 == 15){
                            $tahun = $thn+1;
                        }else{
                            $tahun = $thn;
                        }
                    }elseif($bln+5 == 04 || $bln+5 == 16){
                        $bulan = 04;
                        if($bln+5 == 16){
                            $tahun = $thn+1;
                        }else{
                            $tahun = $thn;
                        }
                    }elseif($bln+5 == 05 || $bln+5 == 17){
                        $bulan = 05;
                        if($bln+5 == 17){
                            $tahun = $thn+1;
                        }else{
                            $tahun = $thn;
                        }
                    }elseif($bln+5 == 06 || $bln+5 == 18){
                        $bulan = 06;
                        if($bln+5 == 18){
                            $tahun = $thn+1;
                        }else{
                            $tahun = $thn;
                        }
                    }elseif($bln+5 == 07 || $bln+5 == 19){
                        $bulan = 07;
                        if($bln+5 == 19){
                            $tahun = $thn+1;
                        }else{
                            $tahun = $thn;
                        }
                    }elseif($bln+5 == 8 || $bln+5 == 20){
                        $bulan = 8;
                        if($bln+5 == 20){
                            $tahun = $thn+1;
                        }else{
                            $tahun = $thn;
                        }
                    }elseif($bln+5 == 9 || $bln+5 == 21){
                        $bulan = 9;
                        if($bln+5 == 21){
                            $tahun = $thn+1;
                        }else{
                            $tahun = $thn;
                        }
                    }elseif($bln+5 == 10 || $bln+5 == 22){
                        $bulan = 10;
                        if($bln+5 == 22){
                            $tahun = $thn+1;
                        }else{
                            $tahun = $thn;
                        }
                    }elseif($bln+5 == 11 || $bln+5 == 23){
                        $bulan = 11;
                        if($bln+5 == 23){
                            $tahun = $thn+1;
                        }else{
                            $tahun = $thn;
                        }
                    }elseif($bln+5 == 12 || $bln+5 == 24){
                        $bulan = 12;
                        if($bln+5 == 24){
                            $tahun = $thn+1;
                        }else{
                            $tahun = $thn;
                        }
                    }
                }elseif($i == 7){
                    if($bln+6 == 01 || $bln+6 == 13){
                        $bulan = 01;
                        if($bln+6 == 13){
                            $tahun = $thn+1;
                        }else{
                            $tahun = $thn;
                        }
                    }elseif($bln+6 == 02 || $bln+6 == 14){
                        $bulan = 02;
                        if($bln+6 == 14){
                            $tahun = $thn+1;
                        }else{
                            $tahun = $thn;
                        }
                    }elseif($bln+6 == 03 || $bln+6 == 15){
                        $bulan = 03;
                        if($bln+6 == 15){
                            $tahun = $thn+1;
                        }else{
                            $tahun = $thn;
                        }
                    }elseif($bln+6 == 04 || $bln+6 == 16){
                        $bulan = 04;
                        if($bln+6 == 16){
                            $tahun = $thn+1;
                        }else{
                            $tahun = $thn;
                        }
                    }elseif($bln+6 == 05 || $bln+6 == 17){
                        $bulan = 05;
                        if($bln+6 == 17){
                            $tahun = $thn+1;
                        }else{
                            $tahun = $thn;
                        }
                    }elseif($bln+6 == 06 || $bln+6 == 18){
                        $bulan = 06;
                        if($bln+6 == 18){
                            $tahun = $thn+1;
                        }else{
                            $tahun = $thn;
                        }
                    }elseif($bln+6 == 07 || $bln+6 == 19){
                        $bulan = 07;
                        if($bln+6 == 19){
                            $tahun = $thn+1;
                        }else{
                            $tahun = $thn;
                        }
                    }elseif($bln+6 == 8 || $bln+6 == 20){
                        $bulan = 8;
                        if($bln+6 == 20){
                            $tahun = $thn+1;
                        }else{
                            $tahun = $thn;
                        }
                    }elseif($bln+6 == 9 || $bln+6 == 21){
                        $bulan = 9;
                        if($bln+6 == 21){
                            $tahun = $thn+1;
                        }else{
                            $tahun = $thn;
                        }
                    }elseif($bln+6 == 10 || $bln+6 == 22){
                        $bulan = 10;
                        if($bln+6 == 22){
                            $tahun = $thn+1;
                        }else{
                            $tahun = $thn;
                        }
                    }elseif($bln+6 == 11 || $bln+6 == 23){
                        $bulan = 11;
                        if($bln+6 == 23){
                            $tahun = $thn+1;
                        }else{
                            $tahun = $thn;
                        }
                    }elseif($bln+6 == 12 || $bln+6 == 24){
                        $bulan = 12;
                        if($bln+6 == 24){
                            $tahun = $thn+1;
                        }else{
                            $tahun = $thn;
                        }
                    }
                }elseif($i == 8){
                    if($bln+7 == 01 || $bln+7 == 13){
                        $bulan = 01;
                        if($bln+7 == 13){
                            $tahun = $thn+1;
                        }else{
                            $tahun = $thn;
                        }
                    }elseif($bln+7 == 02 || $bln+7 == 14){
                        $bulan = 02;
                        if($bln+7 == 14){
                            $tahun = $thn+1;
                        }else{
                            $tahun = $thn;
                        }
                    }elseif($bln+7 == 03 || $bln+7 == 15){
                        $bulan = 03;
                        if($bln+7 == 15){
                            $tahun = $thn+1;
                        }else{
                            $tahun = $thn;
                        }
                    }elseif($bln+7 == 04 || $bln+7 == 16){
                        $bulan = 04;
                        if($bln+7 == 16){
                            $tahun = $thn+1;
                        }else{
                            $tahun = $thn;
                        }
                    }elseif($bln+7 == 05 || $bln+7 == 17){
                        $bulan = 05;
                        if($bln+7 == 17){
                            $tahun = $thn+1;
                        }else{
                            $tahun = $thn;
                        }
                    }elseif($bln+7 == 06 || $bln+7 == 18){
                        $bulan = 06;
                        if($bln+7 == 18){
                            $tahun = $thn+1;
                        }else{
                            $tahun = $thn;
                        }
                    }elseif($bln+7 == 07 || $bln+7 == 19){
                        $bulan = 07;
                        if($bln+7 == 19){
                            $tahun = $thn+1;
                        }else{
                            $tahun = $thn;
                        }
                    }elseif($bln+7 == 8 || $bln+7 == 20){
                        $bulan = 8;
                        if($bln+7 == 20){
                            $tahun = $thn+1;
                        }else{
                            $tahun = $thn;
                        }
                    }elseif($bln+7 == 9 || $bln+7 == 21){
                        $bulan = 9;
                        if($bln+7 == 21){
                            $tahun = $thn+1;
                        }else{
                            $tahun = $thn;
                        }
                    }elseif($bln+7 == 10 || $bln+7 == 22){
                        $bulan = 10;
                        if($bln+7 == 22){
                            $tahun = $thn+1;
                        }else{
                            $tahun = $thn;
                        }
                    }elseif($bln+7 == 11 || $bln+7 == 23){
                        $bulan = 11;
                        if($bln+7 == 23){
                            $tahun = $thn+1;
                        }else{
                            $tahun = $thn;
                        }
                    }elseif($bln+7 == 12 || $bln+7 == 24){
                        $bulan = 12;
                        if($bln+7 == 24){
                            $tahun = $thn+1;
                        }else{
                            $tahun = $thn;
                        }
                    }
                }elseif($i == 9){
                    if($bln+8 == 01 || $bln+8 == 13){
                        $bulan = 01;
                        if($bln+8 == 13){
                            $tahun = $thn+1;
                        }else{
                            $tahun = $thn;
                        }
                    }elseif($bln+8 == 02 || $bln+8 == 14){
                        $bulan = 02;
                        if($bln+8 == 14){
                            $tahun = $thn+1;
                        }else{
                            $tahun = $thn;
                        }
                    }elseif($bln+8 == 03 || $bln+8 == 15){
                        $bulan = 03;
                        if($bln+8 == 15){
                            $tahun = $thn+1;
                        }else{
                            $tahun = $thn;
                        }
                    }elseif($bln+8 == 04 || $bln+8 == 16){
                        $bulan = 04;
                        if($bln+8 == 16){
                            $tahun = $thn+1;
                        }else{
                            $tahun = $thn;
                        }
                    }elseif($bln+8 == 05 || $bln+8 == 17){
                        $bulan = 05;
                        if($bln+8 == 17){
                            $tahun = $thn+1;
                        }else{
                            $tahun = $thn;
                        }
                    }elseif($bln+8 == 06 || $bln+8 == 18){
                        $bulan = 06;
                        if($bln+8 == 18){
                            $tahun = $thn+1;
                        }else{
                            $tahun = $thn;
                        }
                    }elseif($bln+8 == 07 || $bln+8 == 19){
                        $bulan = 07;
                        if($bln+8 == 19){
                            $tahun = $thn+1;
                        }else{
                            $tahun = $thn;
                        }
                    }elseif($bln+8 == 8 || $bln+8 == 20){
                        $bulan = 8;
                        if($bln+8 == 20){
                            $tahun = $thn+1;
                        }else{
                            $tahun = $thn;
                        }
                    }elseif($bln+8 == 9 || $bln+8 == 21){
                        $bulan = 9;
                        if($bln+8 == 21){
                            $tahun = $thn+1;
                        }else{
                            $tahun = $thn;
                        }
                    }elseif($bln+8 == 10 || $bln+8 == 22){
                        $bulan = 10;
                        if($bln+8 == 22){
                            $tahun = $thn+1;
                        }else{
                            $tahun = $thn;
                        }
                    }elseif($bln+8 == 11 || $bln+8 == 23){
                        $bulan = 11;
                        if($bln+8 == 23){
                            $tahun = $thn+1;
                        }else{
                            $tahun = $thn;
                        }
                    }elseif($bln+8 == 12 || $bln+8 == 24){
                        $bulan = 12;
                        if($bln+8 == 24){
                            $tahun = $thn+1;
                        }else{
                            $tahun = $thn;
                        }
                    }
                }elseif($i == 10){
                    if($bln+9 == 01 || $bln+9 == 13){
                        $bulan = 01;
                        if($bln+9 == 13){
                            $tahun = $thn+1;
                        }else{
                            $tahun = $thn;
                        }
                    }elseif($bln+9 == 02 || $bln+9 == 14){
                        $bulan = 02;
                        if($bln+9 == 14){
                            $tahun = $thn+1;
                        }else{
                            $tahun = $thn;
                        }
                    }elseif($bln+9 == 03 || $bln+9 == 15){
                        $bulan = 03;
                        if($bln+9 == 15){
                            $tahun = $thn+1;
                        }else{
                            $tahun = $thn;
                        }
                    }elseif($bln+9 == 04 || $bln+9 == 16){
                        $bulan = 04;
                        if($bln+9 == 16){
                            $tahun = $thn+1;
                        }else{
                            $tahun = $thn;
                        }
                    }elseif($bln+9 == 05 || $bln+9 == 17){
                        $bulan = 05;
                        if($bln+9 == 17){
                            $tahun = $thn+1;
                        }else{
                            $tahun = $thn;
                        }
                    }elseif($bln+9 == 06 || $bln+9 == 18){
                        $bulan = 06;
                        if($bln+9 == 18){
                            $tahun = $thn+1;
                        }else{
                            $tahun = $thn;
                        }
                    }elseif($bln+9 == 07 || $bln+9 == 19){
                        $bulan = 07;
                        if($bln+9 == 19){
                            $tahun = $thn+1;
                        }else{
                            $tahun = $thn;
                        }
                    }elseif($bln+9 == 8 || $bln+9 == 20){
                        $bulan = 8;
                        if($bln+9 == 20){
                            $tahun = $thn+1;
                        }else{
                            $tahun = $thn;
                        }
                    }elseif($bln+9 == 9 || $bln+9 == 21){
                        $bulan = 9;
                        if($bln+9 == 21){
                            $tahun = $thn+1;
                        }else{
                            $tahun = $thn;
                        }
                    }elseif($bln+9 == 10 || $bln+9 == 22){
                        $bulan = 10;
                        if($bln+9 == 22){
                            $tahun = $thn+1;
                        }else{
                            $tahun = $thn;
                        }
                    }elseif($bln+9 == 11 || $bln+9 == 23){
                        $bulan = 11;
                        if($bln+9 == 23){
                            $tahun = $thn+1;
                        }else{
                            $tahun = $thn;
                        }
                    }elseif($bln+9 == 12 || $bln+9 == 24){
                        $bulan = 12;
                        if($bln+9 == 24){
                            $tahun = $thn+1;
                        }else{
                            $tahun = $thn;
                        }
                    }
                }elseif($i == 11){
                    if($bln+10 == 01 || $bln+10 == 13){
                        $bulan = 01;
                        if($bln+10 == 13){
                            $tahun = $thn+1;
                        }else{
                            $tahun = $thn;
                        }
                    }elseif($bln+10 == 02 || $bln+10 == 14){
                        $bulan = 02;
                        if($bln+10 == 14){
                            $tahun = $thn+1;
                        }else{
                            $tahun = $thn;
                        }
                    }elseif($bln+10 == 03 || $bln+10 == 15){
                        $bulan = 03;
                        if($bln+10 == 15){
                            $tahun = $thn+1;
                        }else{
                            $tahun = $thn;
                        }
                    }elseif($bln+10 == 04 || $bln+10 == 16){
                        $bulan = 04;
                        if($bln+10 == 16){
                            $tahun = $thn+1;
                        }else{
                            $tahun = $thn;
                        }
                    }elseif($bln+10 == 05 || $bln+10 == 17){
                        $bulan = 05;
                        if($bln+10 == 17){
                            $tahun = $thn+1;
                        }else{
                            $tahun = $thn;
                        }
                    }elseif($bln+10 == 06 || $bln+10 == 18){
                        $bulan = 06;
                        if($bln+10 == 18){
                            $tahun = $thn+1;
                        }else{
                            $tahun = $thn;
                        }
                    }elseif($bln+10 == 07 || $bln+10 == 19){
                        $bulan = 07;
                        if($bln+10 == 19){
                            $tahun = $thn+1;
                        }else{
                            $tahun = $thn;
                        }
                    }elseif($bln+10 == 8 || $bln+10 == 20){
                        $bulan = 8;
                        if($bln+10 == 20){
                            $tahun = $thn+1;
                        }else{
                            $tahun = $thn;
                        }
                    }elseif($bln+10 == 9 || $bln+10 == 21){
                        $bulan = 9;
                        if($bln+10 == 21){
                            $tahun = $thn+1;
                        }else{
                            $tahun = $thn;
                        }
                    }elseif($bln+10 == 10 || $bln+10 == 22){
                        $bulan = 10;
                        if($bln+10 == 22){
                            $tahun = $thn+1;
                        }else{
                            $tahun = $thn;
                        }
                    }elseif($bln+10 == 11 || $bln+10 == 23){
                        $bulan = 11;
                        if($bln+10 == 23){
                            $tahun = $thn+1;
                        }else{
                            $tahun = $thn;
                        }
                    }elseif($bln+10 == 12 || $bln+10 == 24){
                        $bulan = 12;
                        if($bln+10 == 24){
                            $tahun = $thn+1;
                        }else{
                            $tahun = $thn;
                        }
                    }
                }elseif($i == 12){
                    if($bln+11 == 01 || $bln+11 == 13){
                        $bulan = 01;
                        if($bln+11 == 13){
                            $tahun = $thn+1;
                        }else{
                            $tahun = $thn;
                        }
                    }elseif($bln+11 == 02 || $bln+11 == 14){
                        $bulan = 02;
                        if($bln+11 == 14){
                            $tahun = $thn+1;
                        }else{
                            $tahun = $thn;
                        }
                    }elseif($bln+11 == 03 || $bln+11 == 15){
                        $bulan = 03;
                        if($bln+11 == 15){
                            $tahun = $thn+1;
                        }else{
                            $tahun = $thn;
                        }
                    }elseif($bln+11 == 04 || $bln+11 == 16){
                        $bulan = 04;
                        if($bln+11 == 16){
                            $tahun = $thn+1;
                        }else{
                            $tahun = $thn;
                        }
                    }elseif($bln+11 == 05 || $bln+11 == 17){
                        $bulan = 05;
                        if($bln+11 == 17){
                            $tahun = $thn+1;
                        }else{
                            $tahun = $thn;
                        }
                    }elseif($bln+11 == 06 || $bln+11 == 18){
                        $bulan = 06;
                        if($bln+11 == 18){
                            $tahun = $thn+1;
                        }else{
                            $tahun = $thn;
                        }
                    }elseif($bln+11 == 07 || $bln+11 == 19){
                        $bulan = 07;
                        if($bln+11 == 19){
                            $tahun = $thn+1;
                        }else{
                            $tahun = $thn;
                        }
                    }elseif($bln+11 == 8 || $bln+11 == 20){
                        $bulan = 8;
                        if($bln+11 == 20){
                            $tahun = $thn+1;
                        }else{
                            $tahun = $thn;
                        }
                    }elseif($bln+11 == 9 || $bln+11 == 21){
                        $bulan = 9;
                        if($bln+11 == 21){
                            $tahun = $thn+1;
                        }else{
                            $tahun = $thn;
                        }
                    }elseif($bln+11 == 10 || $bln+11 == 22){
                        $bulan = 10;
                        if($bln+11 == 22){
                            $tahun = $thn+1;
                        }else{
                            $tahun = $thn;
                        }
                    }elseif($bln+11 == 11 || $bln+11 == 23){
                        $bulan = 11;
                        if($bln+11 == 23){
                            $tahun = $thn+1;
                        }else{
                            $tahun = $thn;
                        }
                    }elseif($bln+11 == 12 || $bln+11 == 24){
                        $bulan = 12;
                        if($bln+11 == 24){
                            $tahun = $thn+1;
                        }else{
                            $tahun = $thn;
                        }
                    }
                }
                if(strlen($bulan) <= 1){
                    $bulann = '0'.$bulan;
                }else{
                    $bulann = $bulan;
                }

                $mahasiswa = DB::table('mahasiswa')->where('angkatan', $r->angkatan)->get();
                foreach($mahasiswa as $m){
                    DB::table('tagihan_mahasiswa')->insert([
                        'id_mahasiswa' => $m->id,
                        'id_tahun_akademik' => $r->tahun_ajaran,
                        'bulan' => $bulann,
                        'tahun' => $tahun,
                        'tagihan' => ceil($tagihan),
                        'bayar' => 0,
                        'petugas' => Auth::user()->id
                    ]);
                }
            }
        }
        return redirect()->back();
    }
    public function TambahNonPendidikan(Request $r){

        DB::table('biaya_nonpendidikan')->insert([
            'id_mahasiswa' => $r->id_mahasiswa,
            'jml_bayar' => $r->jml_bayar,
            'jenis' => $r->jenis,
            'keterangan' => $r->keterangan,
            'kasir' => Auth::user()->name,
            'tgl_pembayaran' => date('Y-m-d'),
        ]);
        return redirect('/biaya/nonpendidikan');
    }
    // ======================================================================================//
    // ======================================================================================//
    // Update
    public function StatusSetuju($id){
        DB::table('pengajuan_pembayaran')->where('id_pengajuan', $id)->update([
            'status_pengajuan' => 'Disetujui'
        ]);
        return redirect('/pengajuan/pembayaran');
    }
    public function StatusTolak($id){
        DB::table('pengajuan_pembayaran')->where('id_pengajuan', $id)->update([
            'status_pengajuan' => 'Ditolak'
        ]);
        return redirect('/pengajuan/pembayaran');
    }
    public function EditNonPendidikan(Request $r){
        $data = DB::table('biaya_nonpendidikan')->where('id_biayanon', $r->id)->first();
        $jml_lama = $data->jml_bayar;
        $jml_baru = $jml_lama + ($r->jml_bayar);
        DB::table('biaya_nonpendidikan')->where('id_biayanon', $r->id)->update([
            'jml_bayar' => $jml_baru,
            'tgl_pembayaran' => date('Y-m-d')
        ]);
        return redirect('/biaya/nonpendidikan');
    }
    public function BayarTagihan(Request $r){
        $id = $r->id;
        $data = DB::table('tagihan_mahasiswa')->where('id_tagihan', $id)->first();

        $tagihan_lama = $data->tagihan;
        $tagihan_baru = $tagihan_lama - ($r->uang);

        $bayar_lama = $data->bayar;
        $bayar_baru = $bayar_lama + ($r->uang);

        $bayar = DB::table('tagihan_mahasiswa')->where('id_tagihan', $id)->update([
                    'tagihan' => $tagihan_baru,
                    'bayar' => $bayar_baru
                ]);
        return redirect()->back();
    }
    // ======================================================================================//
    // ======================================================================================//
    // Delete
    public function HapusMasterTagihan($id){
        DB::table('uang_semester')->where('id_uangs', $id)->delete();
        return redirect()->back();
    }
    // ======================================================================================//
}
