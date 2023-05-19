<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Tugas extends Model
{
    public static function datatugas(){
        $data = DB::table('tugas as t')
            ->join('mata_pelajaran as mp', 'mp.id_mapel', '=', 't.id_mapel')
            ->join('kelas as k', 'k.id_kelas', '=', 't.id_kelas')
            ->get();
        return $data;
    }
    public static function tugasmahasiswa($id){
        $data = DB::table('tugas as t')
            ->join('mata_pelajaran as mp', 'mp.id_mapel', '=', 't.id_mapel')
            ->join('karyawan as k', 'k.id', '=', 't.id_karyawan')
            ->where('t.id_kelas', $id)
            ->whereYear('t.mulai', '<=', date('Y'))
            ->whereMonth('t.mulai', '<=', date('m'))
            ->whereDay('t.mulai', '<=', date('d'))
            ->get();
        return $data;
    }
    public static function pengumpulantugas($id){
        $tugas = DB::table('upload_tugas as ut')
            ->join('mahasiswa as m', 'm.id', '=', 'ut.id_mahasiswa')
            ->where('ut.id_tugas', $id)
            ->first();

        $data = DB::table('upload_tugas as ut')
            ->join('mahasiswa as m', 'm.id', '=', 'ut.id_mahasiswa')
            ->where('m.id_kelas', $tugas->id_kelas)
            ->where('ut.id_tugas', $tugas->id_tugas)
            ->orderBy('t.id_tugas', 'DESC')
            ->get();
        return $data;
    }
    public static function Admintugas(){
        $data = DB::table('tugas as t')
            ->join('karyawan as k', 'k.id', '=', 't.id_karyawan')
            ->join('kelas as ke', 'ke.id_kelas', '=', 't.id_kelas')
            ->join('mata_pelajaran as mp', 'mp.id_mapel', '=', 't.id_mapel')
            ->get();
        return $data;
    }
}
