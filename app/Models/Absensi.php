<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Absensi extends Model
{
    public static function DataPelajaranAbsensi($id_kelas){
        $data = DB::table('jadwal_pelajaran as jp')
            ->join('kelas as k', 'k.id_kelas', '=', 'jp.id_kelas')
            ->join('karyawan as kar', 'kar.id', '=', 'jp.id_karyawan')
            ->join('ruangan as r', 'r.id_ruangan', '=', 'jp.id_ruangan')
            ->join('mata_pelajaran as mp', 'mp.id_mapel', '=', 'jp.id_mapel')
            ->join('jam_pelajaran as j', 'j.id_jam', '=', 'jp.id_jam')
            ->join('semester as s', 's.id_semester', '=', 'jp.id_semester')
            ->join('konsentrasi as kon', 'kon.id_konsentrasi', '=', 'k.id_konsentrasi')
            ->where('jp.id_kelas', $id_kelas)
            ->get();
        return $data;
    }
    public static function AbsensiKelas($id_kelas){
        $data = DB::table('absensi_mahasiswa as am')
            ->join('mahasiswa as m', 'm.id', '=', 'am.id_mahasiswa')
            ->where('am.id_kelas', $id_kelas)
            ->where('tanggal_absensi', date('Y-m-d'))
            ->get();
        return $data;
    }

}
