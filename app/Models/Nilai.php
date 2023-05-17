<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Nilai extends Model
{
    public static function Nilai($id){
        $data = DB::table('nilai as n')
            ->join('mahasiswa as m', 'm.id', 'n.id_mahasiswa')
            ->join('mata_pelajaran as mp', 'mp.id_mapel', '=', 'n.id_mapel')
            ->join('kelas as k', 'k.id_kelas', '=', 'n.id_kelas')
            ->where('n.id_kelas', $id)
            ->get();
        return $data;
    }
    public static function NilaiMahasiswa($mahasiswa){
        $data = DB::table('jadwal_pelajaran as jp')
            ->join('mata_pelajaran as mp', 'mp.id_mapel', '=', 'jp.id_mapel')
            ->join('nilai as n', 'n.id_mapel', '=', 'jp.id_mapel')
            ->join('semester as s', 's.id_semester', '=', 'jp.id_semester')
            ->where('n.id_mahasiswa', $mahasiswa)
            ->get();
    return $data;
    }
    // public static function TrackRecordIPK($mahasiswa){
    //     $data = DB::table('nilai as n')
    //         ->join('jadwal_pelajaran as jp', 'jp.id_mapel', '=', 'n.id_mapel')
    //         ->join('semester as s', 's.id_semester', '=', 'jp.id_semester')
    // }
    public static function NilaiMahasiswa2($mahasiswa){
        $data = DB::table('jadwal_pelajaran as jp')
            ->join('nilai as n', 'n.id_mapel', '=', 'jp.id_mapel')
            ->where('n.id_mahasiswa', $mahasiswa)
            ->get();
        return $data;
    }
}
