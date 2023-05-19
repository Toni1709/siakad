<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DownloadController extends Controller
{
    public function download($file){
        $filename = ('berkas/tugas/'.$file);
        if(file_exists($filename)){
            return response()->download($filename);
        }else{
            return;
        }
    }
    public function downloadhasiltugas($file){
        $filename = ('berkas/tugas/mahasiswa/'.$file);
        if(file_exists($filename)){
            return response()->download($filename);
        }else{
            return;
        }
    }
}
