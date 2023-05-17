<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class UploadFile extends Model
{
    public static function Sertifikat($id){
        $data = DB::table('sertifikat_kki')->where('id_mahasiswa', $id)->get();
        return $data;
    }
    public static function LaporanKki($id){
        $data = DB::table('file_laporan_kki')->where('id_mahasiswa', $id)->get();
        return $data;
    }
    public static function NilaiKki($id){
        $data = DB::table('file_nilai_kki')->where('id_mahasiswa', $id)->get();
        return $data;
    }
    public static function Cv($id){
        $data = DB::table('file_cv')->where('id_mahasiswa', $id)->get();
        return $data;
    }
    public static function RevisiLaporan($id){
        $data = DB::table('revisi_laporan_kki')->where('id_mahasiswa', $id)->get();
        return $data;
    }
    public static function TrainingSoftSkill($id){
        $data = DB::table('file_training_softskill')->where('id_mahasiswa', $id)->get();
        return $data;
    }

    public static function DataSertifikat(){
        $data = DB::table('sertifikat_kki as sk')
            ->join('mahasiswa as m', 'm.id', '=', 'sk.id_mahasiswa')
            ->join('kelas as k', 'k.id_kelas', '=', 'sk.id_kelas')
            ->join('konsentrasi as ko', 'ko.id_konsentrasi', '=', 'k.id_konsentrasi')
            ->get();
        return $data;
    }
    public static function DataLaporan(){
        $data = DB::table('file_laporan_kki as sk')
            ->join('mahasiswa as m', 'm.id', '=', 'sk.id_mahasiswa')
            ->join('kelas as k', 'k.id_kelas', '=', 'sk.id_kelas')
            ->join('konsentrasi as ko', 'ko.id_konsentrasi', '=', 'k.id_konsentrasi')
            ->get();
        return $data;
    }
    public static function DataNilai(){
        $data = DB::table('file_nilai_kki as sk')
            ->join('mahasiswa as m', 'm.id', '=', 'sk.id_mahasiswa')
            ->join('kelas as k', 'k.id_kelas', '=', 'sk.id_kelas')
            ->join('konsentrasi as ko', 'ko.id_konsentrasi', '=', 'k.id_konsentrasi')
            ->get();
        return $data;
    }
    public static function DataRevisiLaporan(){
        $data = DB::table('revisi_laporan_kki as sk')
            ->join('mahasiswa as m', 'm.id', '=', 'sk.id_mahasiswa')
            ->join('kelas as k', 'k.id_kelas', '=', 'sk.id_kelas')
            ->join('konsentrasi as ko', 'ko.id_konsentrasi', '=', 'k.id_konsentrasi')
            ->get();
        return $data;
    }
    public static function DataCv(){
        $data = DB::table('file_cv as sk')
            ->join('mahasiswa as m', 'm.id', '=', 'sk.id_mahasiswa')
            ->join('kelas as k', 'k.id_kelas', '=', 'sk.id_kelas')
            ->join('konsentrasi as ko', 'ko.id_konsentrasi', '=', 'k.id_konsentrasi')
            ->get();
        return $data;
    }
}
