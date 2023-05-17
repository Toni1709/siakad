<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class PengajuanTa extends Model
{
    public static function PengajuanJudulMahasiswa($id){
        $data = DB::table('pengajuan_ta as pt')
            ->join('mahasiswa as m', 'm.id', '=', 'pt.id_mahasiswa')
            ->join('karyawan as k', 'k.id', '=', 'pt.pembimbing1')
            ->where('pt.id_mahasiswa', $id)
            ->first();
        return $data;
    }
    public static function PengajuanJudulMahasiswaAcc($id){
        $data = DB::table('pengajuan_ta as pt')
            ->join('mahasiswa as m', 'm.id', '=', 'pt.id_mahasiswa')
            ->join('karyawan as k', 'k.id', '=', 'pt.pembimbing1')
            ->where('status_ta', 'ACC')
            ->where('pt.id_mahasiswa', $id)
            ->first();
        return $data;
    }
    public static function DataPengajuanJudul(){
        $data = DB::table('pengajuan_ta as pt')
            ->join('mahasiswa as m', 'm.id', '=', 'pt.id_mahasiswa')
            ->join('karyawan as k', 'k.id', '=', 'pt.pembimbing1')
            ->join('karyawan as kk', 'kk.id', '=', 'pt.pembimbing2')
            ->join('kelas as ke', 'ke.id_kelas', 'm.id_kelas')
            ->orderBy('pt.id_ta', 'DESC')
            ->get();
        return $data;
    }
    public static function MahasiswaBimbinganDosen($id){
        $data = DB::table('pengajuan_ta as pt')
            ->join('mahasiswa as m', 'm.id', '=', 'pt.id_mahasiswa')
            ->join('kelas as k', 'k.id_kelas', '=', 'm.id_kelas')
            ->join('karyawan as ka', 'ka.id', 'pt.pembimbing1')
            ->where('pt.pembimbing1', $id)
            ->get();
        return $data;
    }
}
