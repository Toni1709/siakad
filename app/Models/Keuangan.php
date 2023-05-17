<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

use function PHPUnit\Framework\returnSelf;

class Keuangan extends Model
{
    public static function uangsemester(){
        $data = DB::table('uang_semester as us')
            ->join('tahun_akademik as ta', 'ta.id_tahun_akademik', '=', 'us.id_tahun_akademik')
            ->orderBy('us.id_uangs', 'DESC')
            ->get();
        return $data;
    }
    public static function tagihanmahasiswa($id){
        $data = DB::table('tagihan_mahasiswa')->where('id_mahasiswa', $id)->get();
        return $data;
    }
    public static function tagihan($id){
        $data = DB::table('tagihan_mahasiswa')
            ->where('bulan', '<=', date('m'))
            ->where('tahun', '<=', date('Y'))
            ->where('id_mahasiswa', $id)
            ->selectRaw('sum(tagihan) as tagihan')
            ->first();
        return $data;
    }
    public static function tagihan2($id){

    }
}
