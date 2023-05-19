<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Mahasiswa extends Model
{
    protected $table = "mahasiswa";

    public static function DataMahasiswa(){
        $data = DB::table('mahasiswa as m')
            ->join('kelas as k', 'k.id_kelas', '=', 'm.id_kelas')
            ->join('konsentrasi as ko', 'ko.id_konsentrasi', '=', 'm.id_konsentrasi')
            ->get();

        return $data;
    }
    public static function EditMahasiswa($id){
        $data = DB::table('mahasiswa')
            ->where('id', $id)
            ->get();
        return $data;
    }
    public static function MahasiswaKelas($id){
        $data = DB::table('mahasiswa')->where('id_kelas', $id)->get();
        return $data;
    }
    public static function BiodataMahasiswa($mahasiswa){
        $data = DB::table('mahasiswa as m')
        ->join('kelas as k', 'k.id_kelas', '=', 'm.id_kelas')
        ->join('konsentrasi as ko', 'ko.id_konsentrasi', '=', 'm.id_konsentrasi')
        ->join('prodi as p', 'p.id_prodi', '=', 'ko.id_prodi')
        ->join('karyawan as ka', 'ka.id', '=', 'k.id_karyawan')
        ->where('m.id', $mahasiswa)
        ->get()
        ->first();

    return $data;
    }
    public static function MahasiswaKeuangan(){
        $data = DB::table('mahasiswa as m')
            ->join('kelas as k', 'k.id_kelas', '=', 'm.id_kelas')
            ->get();
        return $data;
    }
    public static function TagihanMahasiswa($id){
        $data = DB::table('mahasiswa')->where('id', $id)->first();
        return $data;
    }
    public static function viewmahasiswaabsensi($id){
        $data = DB::table('mahasiswa as m')
            ->join('kelas as k', 'k.id_kelas', '=', 'm.id_kelas')
            ->where('m.id_kelas', $id)
            ->get();
        return $data;
    }
}
