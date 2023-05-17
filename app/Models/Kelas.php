<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Kelas extends Model
{
    protected $table = "kelas";

    public static function kelas(){
        $data = DB::table('kelas')->get();
        return $data;
    }

    public static function DataKelas(){
        $data = DB::table('kelas as k')
            ->join('konsentrasi as ko', 'ko.id_konsentrasi', '=', 'k.id_konsentrasi')
            ->join('karyawan as ka', 'ka.id', '=', 'k.id_karyawan')
            ->get();
        return $data;
    }
    public static function DataKelas2(){
        $data = DB::table('kelas as k')
            ->join('konsentrasi as ko', 'ko.id_konsentrasi', '=', 'k.id_konsentrasi')
            ->join('karyawan as ka', 'ka.id', '=', 'k.id_karyawan')
            ->get();
        return $data;
    }
    public static function DataKelas3($id_kelas){
        $data = DB::table('kelas as k')
            ->join('konsentrasi as ko', 'ko.id_konsentrasi', '=', 'k.id_konsentrasi')
            ->join('karyawan as ka', 'ka.id', '=', 'k.id_karyawan')
            ->where('k.id_kelas', $id_kelas)
            ->get();
        return $data;
    }
    public static function DataKelas4($id_kelas){
        $data = DB::table('kelas as k')
            ->join('konsentrasi as ko', 'ko.id_konsentrasi', '=', 'k.id_konsentrasi')
            ->join('karyawan as ka', 'ka.id', '=', 'k.id_karyawan')
            ->join('jadwal_pelajaran as jp', 'jp.id_kelas', '=', 'k.id_kelas')
            ->join('mata_pelajaran as mp', 'mp.id_mapel', '=', 'jp.id_mapel')
            ->where('k.id_kelas', $id_kelas)
            ->get();
        return $data;
    }
    public static function JumlahMahasiswa(){
        $dd = DB::table('mahasiswa')->get();
        $data = 0;
        if($dd->count() > 0 ){
        $data = DB::table('mahasiswa as m')
            ->join('kelas as k', 'k.id_kelas', '=', 'm.id_kelas')
            ->get();
        }else{
            $data = 0;
        }
        return $data;
    }
    public static function DataMahasiswa($id){
        $data = DB::table('mahasiswa as m')
            ->join('kelas as k', 'k.id_kelas', '=', 'm.id_kelas')
            ->where('m.id_kelas', $id)
            ->get();
        return $data;
    }

}
