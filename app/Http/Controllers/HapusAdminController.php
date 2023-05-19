<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HapusAdminController extends Controller
{
    public function HapusTahunAkademik($id_tahun_akademik){
        DB::table('tahun_akademik')
            ->where('id_tahun_akademik', $id_tahun_akademik)
            ->delete();
        return redirect('/tahun_akademik');
    }
    public function HapusGedung($id_gedung){
        DB::table('gedung')
            ->where('id_gedung', $id_gedung)
            ->delete();
        return redirect('/gedung');
    }
    public function HapusProdi($id_prodi){
        DB::table('prodi')
            ->where('id_prodi', $id_prodi)
            ->delete();
        return redirect('/jurusan');
    }
    public function HapusKonsentrasi($id_konsentrasi){
        DB::table('konsentrasi')
            ->where('id_konsentrasi', $id_konsentrasi)
            ->delete();
        return redirect('/jurusan');
    }
    public function HapusKelas($id_kelas){
        DB::table('kelas')
            ->where('id_kelas', $id_kelas)
            ->delete();
        return redirect('/kelas');
    }
    public function HapusMahasiswa($id_mahasiswa){
        DB::table('mahasiswa')
            ->where('id', $id_mahasiswa)
            ->delete();
        return redirect('/mahasiswa');
    }
    public function HapusAdmin($id){
        DB::table('users')
            ->where('id', $id)
            ->delete();
        return redirect('/admin');
    }
    public function HapusSemester($id){
        DB::table('semester')->where('id_semester', $id)->delete();
        return redirect('/semester');
    }
    public function HapusJadwal($id){
        DB::table('jadwal_pelajaran')->where('id_jadwal', $id)->delete();
        return redirect('/jadwal/tambah');
    }
    public function HapusJadwalPelajaran($id){
        DB::table('jadwal_pelajaran')->where('id_jadwal', $id)->delete();
        return redirect()->back();
    }
    public function HapusPengumuman($id){
        DB::table('pengumuman')->where('id_pengumuman', $id)->delete();
        return redirect('/pengumuman');
    }
    public function tugas($id){
        DB::table('tugas')->where('id_tugas', $id)->delete();
        return redirect()->back();
    }
}
