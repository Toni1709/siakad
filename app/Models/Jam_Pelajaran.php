<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Jam_Pelajaran extends Model
{
    protected $table = "jam_pelajaran";
    public static function Jam(){
        $data = DB::table('jam_pelajaran')->get();
        return $data;
    }
}
