<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class PengajuanPembayaran extends Model
{
    public static function PengajuanPembayaran($mahasiswa){
        $data = DB::table('pengajuan_pembayaran as pp')
            ->join('mahasiswa as m', 'm.id', '=', 'pp.id_mahasiswa')
            ->where('pp.id_mahasiswa', $mahasiswa)
            ->get();
        return $data;
    }
    public static function PengajuanPembayaran2(){
        $data = DB::table('pengajuan_pembayaran as pp')
            ->join('mahasiswa as m', 'm.id', '=', 'pp.id_mahasiswa')
            ->get();
        return $data;
    }
}
