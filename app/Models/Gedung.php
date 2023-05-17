<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Gedung extends Model
{
    protected $table = "gedung";

    public static function kode(){
        $kode = DB::table('gedung')->max('id_gedung');
    	$addNol = '';
    	$kode = str_replace("G", "", $kode);
    	$kode = (int) $kode + 1;
        $incrementKode = $kode;

    	if (strlen($kode) == 1) {
    		$addNol = "00";
    	} elseif (strlen($kode) == 2) {
    		$addNol = "0";
    	} 

    	$kodeBaru = "G".$addNol.$incrementKode;
    	return $kodeBaru;
    }
}
