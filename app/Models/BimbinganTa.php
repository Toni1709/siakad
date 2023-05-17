<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class BimbinganTa extends Model
{
    public static function BimbinganTa($id){
        $data = DB::table('bimbingan_ta')->where('id_mahasiswa', $id)->get();
        return $data;
    }
}
