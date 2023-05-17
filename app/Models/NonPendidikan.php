<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class NonPendidikan extends Model
{
    public static function BiayaNonPendidikan(){
        $data = DB::table('biaya_nonpendidikan as bn')
            ->join('mahasiswa as m', 'm.id', '=', 'bn.id_mahasiswa')
            ->join('kelas as k', 'k.id_kelas', '=', 'm.id_kelas')
            ->get();
        return $data;
    }
    public static function BiayaNonPendidikanMahasiswa($id){
        $data = DB::table('biaya_nonpendidikan')
            ->where('id_mahasiswa', $id)
            ->get();
        return $data;
    }
}
