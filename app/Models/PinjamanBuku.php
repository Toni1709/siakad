<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class PinjamanBuku extends Model
{
    public static function DataPinjamanBuku(){
        $data = DB::table('pinjaman_buku as pb')
            ->join('mahasiswa as m', 'm.id', '=', 'pb.id_mahasiswa')
            ->join('kelas as k', 'k.id_kelas', '=', 'm.id_kelas')
            ->join('daftar_buku as db', 'db.id_buku', '=', 'pb.id_buku')
            ->orderBy('pb.id_pinjaman', 'DESC')
            ->get();
        return $data;
    }
    public static function DataPinjamanBukuEdit($id){
        $data = DB::table('pinjaman_buku')->where('id_pinjaman', $id)->first();
        return $data;
    }
    public static function HapusPinjaman($id){
        $data = DB::table('pinjaman_buku')->where('id_pinjaman', $id)->delete();
        return $data;
    }
    public static function RiwayatPinjaman($id){
        $data = DB::table('pinjaman_buku as pb')
            ->join('daftar_buku as db', 'db.id_buku', '=', 'pb.id_buku')
            ->join('jenis_buku as jb', 'jb.id_jenis_buku', '=', 'db.id_jenis_buku')
            ->where('pb.id_mahasiswa', $id)
            ->orderBy('pb.id_pinjaman', 'DESC')
            ->get();
        return $data;
    }
}
