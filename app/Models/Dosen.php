<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Dosen extends Model
{
    protected $table = "karyawan";

    public static function Dosen(){
        $data = DB::table('karyawan')->get();
        return $data;
    }
}
