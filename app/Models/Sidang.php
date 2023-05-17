<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Sidang extends Model
{
    public static function DaftarSidang($id){
        $sidang = DB::table('daftar_sidang')->where('id_mahasiswa', $id)->first();
        return $sidang;
    }
    public static function VerifikasiSidang($id){
        $data = DB::table('verifikasi_sidang')->where('id_mahasiswa', $id)->first();
        return $data;
    }
    public static function VerifikasiSidangDosen($id){
        $data = DB::table('verifikasi_sidang as vs')
            ->join('pengajuan_ta as pt', 'pt.id_ta', '=', 'vs.id_ta')
            ->join('mahasiswa as m', 'm.id', '=', 'vs.id_mahasiswa')
            ->join('kelas as k', 'k.id_kelas', '=', 'm.id_kelas')
            ->where('pt.pembimbing1', $id)
            ->get();
        return $data;
    }
}
