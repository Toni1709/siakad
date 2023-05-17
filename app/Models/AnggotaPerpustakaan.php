<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class AnggotaPerpustakaan extends Model
{
    public static function NoAnggota(){
        $date = date('Ymd');
        $kode = DB::table('anggota_perpustakaan')->max('id_anggota');
    	$addNol = '';
    	$kode = str_replace("", "", $kode);
    	$kode = (int) $kode + 1;
        $incrementKode = $kode;

    	if (strlen($kode) == 1) {
    		$addNol = "00";
    	} elseif (strlen($kode) == 2) {
    		$addNol = "0";
    	}

    	$kodeBaru = $date.$addNol.$incrementKode;
    	return $kodeBaru;
    }
    public static function DataAnggota(){
        $data = DB::table('anggota_perpustakaan as ap')
            ->join('mahasiswa as m', 'm.id', '=', 'ap.id_mahasiswa')
            ->join('kelas as k', 'k.id_kelas', '=', 'm.id_kelas')
            ->get();
        return $data;
    }
    public static function DataAnggotaEdit($id){
        $data = DB::table('anggota_perpustakaan')
            ->where('id_anggota', $id)
            ->first();
        return $data;
    }
    public static function HapusKeanggotaan($id){
        $data = DB::table('anggota_perpustakaan')->where('id_anggota', $id)->delete();
        return $data;
    }
    public static function Anggota($id){
        $data = DB::table('anggota_perpustakaan as ap')
            ->join('mahasiswa as m', 'm.id', '=', 'ap.id_mahasiswa')
            ->join('kelas as k', 'k.id_kelas', '=', 'm.id_kelas')
            ->where('ap.id_mahasiswa', $id)
            ->first();
        return $data;
    }
}
