<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TambahController extends Controller
{
    public function InputAbsensi(Request $request){
        $mahasiswa = count($request->mahasiswa);
        // dd($mahasiswa);
        for($i = 1; $i <= $mahasiswa; $i++){
            DB::table('absensi_mahasiswa')->insert([
                'id_mahasiswa' => $request->mahasiswa[$i],
                'kehadiran' => $request->kehadiran[$i],
                'tanggal_absensi' => $request->tgl,
                'id_kelas' => $request->kelas,
                'id_konsentrasi' => $request->konsentrasi,
                'id_mapel' => $request->mapel
            ]);
        }
        return redirect()->back();
    }
    public function TambahNilai(Request $r){
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

            DB::table('nilai')->insert([
                'id_mahasiswa' => $r->id_mahasiswa[$i],
                'id_mapel' => $r->id_mapel,
                'semester' => $r->semester,
                'id_kelas' => $r->id_kelas,
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
    public function tugas(Request $request){

        $jadwal = DB::table('jadwal_pelajaran')->where('id_jadwal', $request->id_jadwal)->first();

        $file = $request->file('file');
        $filename = uniqid().'.'.$file->getClientOriginalExtension();
        $file->move('berkas/tugas', $filename);

        DB::table('tugas')->insert([
            'id_jadwal' => $request->id_jadwal,
            'id_mapel' => $jadwal->id_mapel,
            'id_kelas' => $jadwal->id_kelas,
            'id_karyawan' => $jadwal->id_karyawan,
            'file' => $filename,
            'keterangan' => $request->keterangan,
            'mulai' => $request->mulai,
            'selesai' => $request->selesai
        ]);
        return redirect('/tugas');
    }
}
