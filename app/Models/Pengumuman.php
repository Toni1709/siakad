<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Pengumuman extends Model
{
    public static function Pengumuman(){
        $data = DB::table('pengumuman')->get();
        return $data;
    }
    public static function DetailPengumuman($id){
        $data = DB::table('pengumuman')
            ->where('id_pengumuman', $id)
            ->first();
        return $data;
    }
    public static function PengumumanMahasiswa($id){
        $data = DB::table('pengumuman')
            ->where('tujuan', 'Mahasiswa')
            ->get();
        return $data;
    }
    public static function PengumumanUmum(){
        $data = DB::table('pengumuman')
            ->where('tujuan', 'Semua')
            ->get();
        return $data;
    }
}
