<?php

namespace App\Http\Controllers;

use App\Models\Ajax;
use App\Models\JadwalPelajaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AjaxController extends Controller
{
    public function AmbilDataKelas(){
        $id_jurusan = Request('id');
        $data = DB::table('kelas')->where('id_konsentrasi', $id_jurusan)->get();
        return response()->json($data);
    }
    public function DataKelas($id){
        $data['kelas'] = Ajax::DataKelas($id);
        return view('admin.absensi.datakelas', $data);
    }
    public function kehadiran($id){
        $data['jadwal'] = JadwalPelajaran::JadwalPelajaranMahasiswaAjax(Auth::user()->id, $id);
        // dd($data['jadwal']);
        return view('front.mahasiswa.data.kehadiran', $data);
    }
}
