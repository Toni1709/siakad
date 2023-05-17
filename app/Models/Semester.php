<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Semester extends Model
{
    public static function DataSemester(){
        $data = DB::table('semester')->get();
        return $data;
    }
    public static function DataSemester2(){
        $data = DB::table('semester')->where('id')->get();
        return $data;
    }
}
