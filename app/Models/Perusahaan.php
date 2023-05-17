<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Perusahaan extends Model
{
    public static function DataPerusahaan(){
        $data = DB::table('perusahaan')->get();
        return $data;
    }
}
