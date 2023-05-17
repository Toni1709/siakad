<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class JenisBuku extends Model
{
    public static function DataJenisBuku(){
        $data = DB::table('jenis_buku')->get();
        return $data;
    }
    public static function HapusJenisBuku($id){
        $data = DB::table('jenis_buku')->where('id_jenis_buku', $id)->delete();
        return $data;
    }
    public static function DaftarBuku(){
        $data = DB::table('daftar_buku as dp')
            ->join('jenis_buku as jb', 'jb.id_jenis_buku', '=', 'dp.id_jenis_buku')
            ->get();
        return $data;
    }
    public static function HapusDaftarBuku($id){
        $data = DB::table('daftar_buku')->where('id_buku', $id)->delete();
        return $data;
    }
}
