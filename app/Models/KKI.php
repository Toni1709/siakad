<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class KKI extends Model
{
    public static function BimbinganKki($id){
        $data = DB::table('bimbingan_kki')->where('id_mahasiswa', $id)->get();
        return $data;
    }
}
