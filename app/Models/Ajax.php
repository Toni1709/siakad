<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Ajax extends Model
{
    public static function DataKelas($id){
        $data = DB::table('kelas as k')
            ->join('jadwal_pelajaran as jp', 'jp.id_kelas', '=', 'k.id_kelas')
            ->join('karyawan as ka', 'ka.id', '=', 'k.id_karyawan')
            ->join('mata_pelajaran as m', 'm.id_mapel', '=', 'jp.id_mapel')
            ->where('jp.id_kelas', $id)
            ->get();
        return $data;
    }
}
