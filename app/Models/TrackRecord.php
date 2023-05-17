<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class TrackRecord extends Model
{
    public static function IPK($id){
        $semeseter = Semester::DataSemester();
        $ipk = [];
        foreach($semeseter as $s){
            $data2 = DB::table('jadwal_pelajaran as jp')
                ->join('nilai as n', 'n.id_mapel', '=', 'jp.id_mapel')
                ->selectRaw('sum(n.mutu) as mutu')
                ->selectRaw('sum(jp.sks) as sks')
                ->where('n.id_mahasiswa', $id)
                ->where('n.semester', $s->id_semester)
                ->first();
            if($data2->mutu){
                $mutu = $data2->mutu;
            }else{
                $mutu = 0;
            }

            if($data2->sks){
                $sks = $data2->sks;
            }else{
                $sks = 1;
            }
            $nilai = $mutu / $sks;
            $ipk[$s->semester]['nilai'] = $nilai;
        }
        return $ipk;
    }
    public static function MagangKerja($id){
        $data = DB::table('magang_kerja as mk')
            ->join('perusahaan as p', 'p.id_perusahaan', '=', 'mk.id_perusahaan')
            ->get();
        return $data;
    }
}
