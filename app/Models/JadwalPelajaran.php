<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class JadwalPelajaran extends Model
{

    public static function JadwalPelajaran(){
        $data = DB::table('jadwal_pelajaran as jp')
            ->join('karyawan as k', 'k.id', '=', 'jp.id_karyawan')
            ->join('kelas as ke', 'ke.id_kelas', '=', 'jp.id_kelas')
            ->join('semester as s', 's.id_semester', '=', 'jp.id_semester')
            ->join('ruangan as r', 'r.id_ruangan', '=', 'jp.id_ruangan')
            ->join('mata_pelajaran as mp', 'mp.id_mapel', '=', 'jp.id_mapel')
            ->join('jam_pelajaran as j', 'j.id_jam', '=', 'jp.id_jam')
            ->get();
        return $data;
    }
    public static function JadwalPelajaranKelas($id_kelas){
        $data = DB::table('jadwal_pelajaran as jp')
            ->join('karyawan as k', 'k.id', '=', 'jp.id_karyawan')
            ->join('kelas as ke', 'ke.id_kelas', '=', 'jp.id_kelas')
            ->join('semester as s', 's.id_semester', '=', 'jp.id_semester')
            ->join('ruangan as r', 'r.id_ruangan', '=', 'jp.id_ruangan')
            ->join('mata_pelajaran as mp', 'mp.id_mapel', '=', 'jp.id_mapel')
            ->join('jam_pelajaran as j', 'j.id_jam', '=', 'jp.id_jam')
            ->where('jp.id_kelas', $id_kelas)
            ->get();
        return $data;
    }
    public static function JadwalPelajaranMahasiswa($id_mahasiswa){
        $data = DB::table('jadwal_pelajaran as jp')
            ->join('karyawan as k', 'k.id', '=', 'jp.id_karyawan')
            ->join('kelas as ke', 'ke.id_kelas', '=', 'jp.id_kelas')
            ->join('semester as s', 's.id_semester', '=', 'jp.id_semester')
            ->join('ruangan as r', 'r.id_ruangan', '=', 'jp.id_ruangan')
            ->join('mata_pelajaran as mp', 'mp.id_mapel', '=', 'jp.id_mapel')
            ->join('jam_pelajaran as j', 'j.id_jam', '=', 'jp.id_jam')
            ->join('mahasiswa as m', 'm.id_kelas', '=', 'ke.id_kelas')
            ->where('m.id', $id_mahasiswa)
            ->get();
        return $data;
    }
    public static function JadwalPelajaranMahasiswaAjax($id_mahasiswa, $id_semester){
        $data = DB::table('jadwal_pelajaran as jp')
            ->join('karyawan as k', 'k.id', '=', 'jp.id_karyawan')
            ->join('kelas as ke', 'ke.id_kelas', '=', 'jp.id_kelas')
            ->join('semester as s', 's.id_semester', '=', 'jp.id_semester')
            ->join('ruangan as r', 'r.id_ruangan', '=', 'jp.id_ruangan')
            ->join('mata_pelajaran as mp', 'mp.id_mapel', '=', 'jp.id_mapel')
            ->join('jam_pelajaran as j', 'j.id_jam', '=', 'jp.id_jam')
            ->join('mahasiswa as m', 'm.id_kelas', '=', 'ke.id_kelas')
            ->where('m.id', $id_mahasiswa)
            ->where('jp.id_semester', $id_semester)
            ->get();
        return $data;
    }
    public static function JadwalDosen(){
        $data = DB::table('jadwal_pelajaran as jp')
            ->join('karyawan as k', 'k.id', '=', 'jp.id_karyawan')
            ->join('kelas as ke', 'ke.id_kelas', '=', 'jp.id_kelas')
            ->join('ruangan as r', 'r.id_ruangan', '=', 'jp.id_ruangan')
            ->join('jam_pelajaran as j', 'j.id_jam', '=', 'jp.id_jam')
            ->join('semester as s', 's.id_semester', '=', 'jp.id_semester')
            ->join('mata_pelajaran as mp', 'mp.id_mapel', '=', 'jp.id_mapel')
            ->where('jp.id_karyawan', Auth::user()->id)
            ->get();
        return $data;
    }
    public static function AbsensiKelas($id){
        $data = DB::table('jadwal_pelajaran as jp')
            ->join('kelas as k', 'k.id_kelas', '=', 'jp.id_kelas')
            ->join('karyawan as kar', 'kar.id', '=', 'jp.id_karyawan')
            ->join('ruangan as r', 'r.id_ruangan', '=', 'jp.id_ruangan')
            ->join('mata_pelajaran as mp', 'mp.id_mapel', '=', 'jp.id_mapel')
            ->join('jam_pelajaran as j', 'j.id_jam', '=', 'jp.id_jam')
            ->join('semester as s', 's.id_semester', '=', 'jp.id_semester')
            ->join('konsentrasi as kon', 'kon.id_konsentrasi', '=', 'k.id_konsentrasi')
            ->where('jp.id_kelas', $id)
            ->first();
        return $data;
    }
    public static function JadwalMengajarDosen(){
        $data = DB::table('jadwal_pelajaran as jp')
            ->join('karyawan as k', 'k.id', '=', 'jp.id_karyawan')
            ->join('mata_pelajaran as mp', 'mp.id_mapel', '=', 'jp.id_mapel')
            ->join('kelas as ke', 'ke.id_kelas', '=', 'jp.id_kelas')
            ->join('ruangan as r', 'r.id_ruangan', '=', 'jp.id_ruangan')
            ->join('jam_pelajaran as j', 'j.id_jam', '=', 'jp.id_jam')
            ->get();
        return $data;
    }
    public static function JadwalMahasiswa($id){
        $semsester = DB::table('jadwal_pelajaran')->where('id_kelas', $id)->selectRaw('max(id_semester) as id')->first();

        $data = DB::table('jadwal_pelajaran as jp')
        ->join('karyawan as k', 'k.id', '=', 'jp.id_karyawan')
        ->join('mata_pelajaran as mp', 'mp.id_mapel', '=', 'jp.id_mapel')
        ->join('kelas as ke', 'ke.id_kelas', '=', 'jp.id_kelas')
        ->join('ruangan as r', 'r.id_ruangan', '=', 'jp.id_ruangan')
        ->join('jam_pelajaran as j', 'j.id_jam', '=', 'jp.id_jam')
        ->join('semester as s', 's.id_semester', '=', 'jp.id_semester')
        ->where('jp.id_kelas', $id)
        ->where('jp.id_semester', $semsester->id)
        ->get();
    return $data;
    }
    public static function JadwalMahasiswaall($id){

        $data = DB::table('jadwal_pelajaran as jp')
        ->join('karyawan as k', 'k.id', '=', 'jp.id_karyawan')
        ->join('mata_pelajaran as mp', 'mp.id_mapel', '=', 'jp.id_mapel')
        ->join('kelas as ke', 'ke.id_kelas', '=', 'jp.id_kelas')
        ->join('ruangan as r', 'r.id_ruangan', '=', 'jp.id_ruangan')
        ->join('jam_pelajaran as j', 'j.id_jam', '=', 'jp.id_jam')
        ->join('semester as s', 's.id_semester', '=', 'jp.id_semester')
        ->where('jp.id_kelas', $id)
        ->orderByDesc('jp.id_semester')
        ->get();
    return $data;
    }
}
