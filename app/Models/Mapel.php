<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Mapel extends Model
{
    protected $table = "mata_pelajaran";
    public static function Mapel(){
        $data = DB::table('mata_pelajaran')->get();
        return $data;
    }
}
