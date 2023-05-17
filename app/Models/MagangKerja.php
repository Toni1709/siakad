<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class MagangKerja extends Model
{
    public static function MagangKerja(){
        $data = DB::table('magang_kerja as mk')
            ->join('perusahaan as p', 'p.id_perusahaan', '=', 'mk.id_perusahaan')
            ->get();
        return $data;
    }
}
