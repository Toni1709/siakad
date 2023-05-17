<?php

namespace App\Http\Controllers;

use App\Models\MagangKerja;
use App\Models\Perusahaan;
use App\Models\UploadFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CnPController extends Controller
{
    public function Perusahaan(){
        $data['perusahaan'] = Perusahaan::DataPerusahaan();
        return view('admin.cnp.perusahaan', $data);
    }
    public function TambahPerusahaan(Request $r){
        DB::table('perusahaan')->insert([
            'nama_perusahaan' => $r->nama,
            'kontak' => $r->kontak,
            'email' => $r->email,
            'alamat' => $r->alamat
        ]);
        return redirect('/perusahaan');
    }
    public function EditPerusahaan(Request $r){
        DB::table('perusahaan')->where('id_perusahaan', $r->id)->update([
            'nama_perusahaan' => $r->nama,
            'kontak' => $r->kontak,
            'email' => $r->email,
            'alamat' => $r->alamat
        ]);
        return redirect('/perusahaan');
    }
    public function HapusPerusahaan($id){
        DB::table('perusahaan')->where('id_perusahaan', $id)->delete();
        return redirect('/perusahaan');
    }

    public function MagangKerja(){
        $data['perusahaan'] = Perusahaan::DataPerusahaan();
        $data['magang_kerja'] = MagangKerja::MagangKerja();
        return view('admin.cnp.data_magang', $data);
    }
    public function TambahMagangKerja(Request $r){
        DB::table('magang_kerja')->insert([
            'id_perusahaan' => $r->id_perusahaan,
            'tgl_proses' => $r->tgl_proses,
            'penempatan' => $r->penempatan,
            'posisi' => $r->posisi,
            'tgl_mulai' => $r->tgl_mulai
        ]);
        return redirect('/magang_kerja');
    }
    public function EditMagangKerja(Request $r){
        DB::table('magang_kerja')->where('id_mk', $r->id)->update([
            'id_perusahaan' => $r->id_perusahaan,
            'tgl_proses' => $r->tgl_proses,
            'penempatan' => $r->penempatan,
            'posisi' => $r->posisi,
            'tgl_mulai' => $r->tgl_mulai
        ]);
        return redirect('/magang_kerja');
    }
    public function HapusMagangKerja($id){
        DB::table('magang_kerja')->where('id_mk', $id)->delete();
        return redirect('/magang_kerja');
    }

    public function Sertifikat(){
        $data['sertifikat'] = UploadFile::DataSertifikat();
        return view('admin.cnp.berkas.sertifikat_kki', $data);
    }
    public function LaporanKKI(){
        $data['laporan'] = UploadFile::DataLaporan();
        return view('admin.cnp.berkas.laporan_kki', $data);
    }
    public function NilaiKki(){
        $data['nilai'] = UploadFile::DataNilai();
        return view('admin.cnp.berkas.nilai', $data);
    }
    public function RevisiLaporan(){
        $data['laporan'] = UploadFile::DataRevisiLaporan();
        return view('admin.cnp.berkas.revisi_laporan', $data);
    }
    public function Cv(){
        $data['cv'] = UploadFile::DataCv();
        return view('admin.cnp.berkas.cv', $data);
    }
    public function HapusSertifikat($id){
        DB::table('sertifikat_kki')->where('id_sertifikat', $id)->delete();
        return redirect('/berkas/sertifikat');
    }
    public function HapusLaporan($id){
        DB::table('file_laporan_kki')->where('id_laporan', $id)->delete();
        return redirect('/berkas/laporan_kki');
    }
    public function HapusNilaiKki($id){
        DB::table('file_nilai_kki')->where('id_lnilai', $id)->delete();
        return redirect('/berkas/nilai_kki');
    }
    public function HapusRevisiLaporan($id){
        DB::table('revisi_laporan_kki')->where('id_rl', $id)->delete();
        return redirect('/berkas/revisi_laporan');
    }
    public function HapusCv($id){
        DB::table('file_cv')->where('id_cv', $id)->delete();
        return redirect('/berkas/curriculum_vitae');
    }
}
