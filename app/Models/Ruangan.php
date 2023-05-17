<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Ruangan extends Model
{
    protected $table = "ruangan";

    public static function Ruangan(){
        $data = DB::table('ruangan')->get();
        return $data;
    }
    public static function kode(){
        $kode = DB::table('ruangan')->max('id_ruangan');
    	$addNol = '';
    	$kode = str_replace("R", "", $kode);
    	$kode = (int) $kode + 1;
        $incrementKode = $kode;

    	if (strlen($kode) == 1) {
    		$addNol = "00";
    	} elseif (strlen($kode) == 2) {
    		$addNol = "0";
    	}

    	$kodeBaru = "R".$addNol.$incrementKode;
    	return $kodeBaru;
    }
    public static function DataRuangan(){
        $data = DB::table('ruangan as r')
            ->join('gedung as g', 'g.id_gedung', '=', 'r.id_gedung')
            ->get();

        return $data;
    }
}
