<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EditController extends Controller
{
    public function EditJadwalKelasAktif($id){
        DB::table('jadwal_pelajaran')->where('id_jadwal', $id)->update([
            'aktif' => 'non aktif'
        ]);
        return redirect('/absensi_kelas');
    }
    public function EditJadwalKelasNonAktif($id){
        DB::table('jadwal_pelajaran')->where('id_jadwal', $id)->update([
            'aktif' => 'aktif'
        ]);
        return redirect('/absensi_kelas');
    }
    public function UpdateAbsensi(Request $request){
        $mahasiswa = count($request->mahasiswa);
        for($i = 1; $i <= $mahasiswa; $i++){
            DB::table('absensi_mahasiswa')->where('id_absensi', $request->id[$i])->update([
                'kehadiran' => $request->kehadiran[$i],
            ]);
        }
        return redirect()->back();
    }
    public function UpdateNilai(Request $r){
        $mahasiswa = count($r->id_mahasiswa);
        for($i = 1; $i <= $mahasiswa; $i++){
            $grade = $r->grade[$i];
            if($grade == 'A'){
                $angka_mutu = 4.0;
            }elseif($grade == 'A-'){
                $angka_mutu = 3.6;
            }elseif($grade == 'B+'){
                $angka_mutu = 3.3;
            }elseif($grade == 'B'){
                $angka_mutu = 3.0;
            }elseif($grade == 'B-'){
                $angka_mutu = 2.6;
            }elseif($grade == 'C+'){
                $angka_mutu = 2.3;
            }elseif($grade == 'C'){
                $angka_mutu = 2.0;
            }elseif($grade == 'C-'){
                $angka_mutu = 1.6;
            }elseif($grade == 'D'){
                $angka_mutu = 1.0;
            }else{
                $angka_mutu = 0;
            }
            $mutu = ($r->sks) * $angka_mutu;
            DB::table('nilai')->where('id_mahasiswa', $r->id_mahasiswa[$i])->update([
                'absensi' => $r->absensi[$i],
                'formatif' => $r->formatif[$i],
                'tugas' => $r->tugas[$i],
                'uts' => $r->uts[$i],
                'uas' => $r->uas[$i],
                'grade' => $r->grade[$i],
                'rata_rata' => $r->rata[$i],
                'angka_mutu' => $angka_mutu,
                'mutu' => $mutu
            ]);
        }
        return redirect()->back();
    }
    public function VerifikasiBimbinganTa(Request $r){
        $jumlahData = count($r->verifikasi);
        for($i = 1; $i <= $jumlahData; $i++){
            DB::table('bimbingan_ta')->where('id_bimbingan_ta', $r->id[$i])->update([
                'verifikasi' => $r->verifikasi[$i]
            ]);
        }
        return redirect()->back();
        // dd($jumlahData);
    }
    public function VerifikasiSidang($id){
        DB::table('verifikasi_sidang')->where('id_ver_sidang', $id)->update([
            'ver_pembimbing' => 'Diverifikasi'
        ]);
        return redirect()->back();
    }
}
