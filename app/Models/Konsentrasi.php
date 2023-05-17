<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Konsentrasi extends Model
{
    protected $table = 'konsentrasi';

    public static function DataKonsentrasi(){
        $data = DB::table('konsentrasi as k')
            ->join('prodi as p', 'p.id_prodi', '=', 'k.id_prodi')
            ->get();
        return $data;
    }
}
