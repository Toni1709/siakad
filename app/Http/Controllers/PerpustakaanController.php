<?php

namespace App\Http\Controllers;

use App\Models\AnggotaPerpustakaan;
use App\Models\JenisBuku;
use App\Models\Mahasiswa;
use App\Models\PinjamanBuku;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PerpustakaanController extends Controller
{
    // ==================================================================================//
    // Jenis Buku
    public function JenisBuku(){
        $data['jenis'] = JenisBuku::DataJenisBuku();
        return view('admin.perpustakaan.jenis_buku', $data);
    }
    public function TambahJenisBuku(Request $r){
        DB::table('jenis_buku')->insert([
            'jenis_buku' => $r->jenis
        ]);
        return redirect('/jenis_buku');
    }
    public function EditJenisBuku(Request $r){
        DB::table('jenis_buku')->where('id_jenis_buku', $r->id)->update([
            'jenis_buku' => $r->jenis
        ]);
        return redirect('/jenis_buku');
    }
    public function HapusJenisBuku($id){
        JenisBuku::HapusJenisBuku($id);
        return redirect('/jenis_buku');
    }
     // ==================================================================================//
    // Daftar Buku
    public function DaftarBuku(){
        $data['jenis_buku'] = JenisBuku::DataJenisBuku();
        $data['daftarbuku'] = JenisBuku::DaftarBuku();
        return view('admin.perpustakaan.data_buku', $data);
    }
    public function TambahDaftarBuku(Request $r){
        DB::table('daftar_buku')->insert([
            'id_jenis_buku' => $r->jenis_buku,
            'judul_buku' => $r->judul,
            'penerbit' => $r->penerbit,
            'tahun_terbit' => $r->tahun,
            'jumlah_buku' => $r->jumlah,
            'tanggal_masuk' => $r->tanggal
        ]);
        return redirect('/daftar_buku');
    }
    public function EditDaftarBuku(Request $r){
        DB::table('daftar_buku')->where('id_buku', $r->id)->update([
            'id_jenis_buku' => $r->jenis_buku,
            'judul_buku' => $r->judul,
            'penerbit' => $r->penerbit,
            'tahun_terbit' => $r->tahun,
            'jumlah_buku' => $r->jumlah,
            'tanggal_masuk' => $r->tanggal
        ]);
        return redirect('/daftar_buku');
    }
    public function HapusDaftarBuku($id){
        JenisBuku::HapusDaftarBuku($id);
        return redirect('/daftar_buku');
    }
     // ==================================================================================//
    // Keanggotaan
    public function Keanggotaan(){
        $data['anggota'] = AnggotaPerpustakaan::DataAnggota();
        return view('admin.perpustakaan.anggota_perpustakaan', $data);
    }
    public function FormKeanggotaan(){
        $data['mahasiswa'] = Mahasiswa::DataMahasiswa();
        $data['no_anggota'] = AnggotaPerpustakaan::NoAnggota();
        return view('admin.perpustakaan.form.tambah_anggota_perpustakaan', $data);
    }
    public function FormEditKeanggotaan($id){
        $data['mahasiswa'] = Mahasiswa::DataMahasiswa();
        $data['anggota'] = AnggotaPerpustakaan::DataAnggotaEdit($id);
        return view('admin.perpustakaan.form.edit_anggota_perpustakaan', $data);
    }
    public function TambahKeanggotaan(Request $r){
        DB::table('anggota_perpustakaan')->insert([
            'id_anggota' => $r->id_anggota,
            'id_mahasiswa' => $r->id_mahasiswa,
            'tgl_daftar' => date('Y-m-d')
        ]);
        return redirect('/keanggotaan');
    }
    public function EditKeanggotaan(Request $r){
        DB::table('anggota_perpustakaan')->where('id_anggota', $r->id)->update([
            'id_mahasiswa' => $r->id_mahasiswa
        ]);
        return redirect('/keanggotaan');
    }
    public function HapusKeanggotaan($id){
        AnggotaPerpustakaan::HapusKeanggotaan($id);
        return redirect('/keanggotaan');
    }
    // ==================================================================================//
    // Pinjaman Buku
    public function Pinjaman(){
        $data['pinjaman'] = PinjamanBuku::DataPinjamanBuku();
        return view('admin.perpustakaan.pinjaman_buku', $data);
    }
    public function FormPinjaman(){
        $data['mahasiswa'] = AnggotaPerpustakaan::DataAnggota();
        $data['buku'] = JenisBuku::DaftarBuku();
        return view('admin.perpustakaan.form.tambah_pinjaman', $data);
    }
    public function FormEditPinjaman($id){
        $data['mahasiswa'] = AnggotaPerpustakaan::DataAnggota();
        $data['buku'] = JenisBuku::DaftarBuku();
        $data['pinjaman'] = PinjamanBuku::DataPinjamanBukuEdit($id);
        return view('admin.perpustakaan.form.edit_pinjaman', $data);
    }
    public function TambahPinjaman(Request $r){
        $tgl_pinjam = $r->tgl_pinjam;
        $lama_pinjam = '+'.$r->lama_pinjam.' days';
        $tgl_jatuh_tempo = date('Y-m-d', strtotime($lama_pinjam, strtotime($tgl_pinjam)));
        DB::table('pinjaman_buku')->insert([
            'id_mahasiswa' => $r->id_mahasiswa,
            'id_buku' => $r->id_buku,
            'tgl_pinjam' => $r->tgl_pinjam,
            'tgl_jatuh_tempo' => $tgl_jatuh_tempo,
            'status_pengembalian' => 'Belum Dikembalikan'
        ]);
        return redirect('/pinjaman');
    }
    public function EditPinjaman(Request $r){
        $tgl_pinjam = $r->tgl_pinjam;
        $lama_pinjam = '+'.$r->lama_pinjam.' days';
        $tgl_jatuh_tempo = date('Y-m-d', strtotime($lama_pinjam, strtotime($tgl_pinjam)));
        DB::table('pinjaman_buku')->where('id_pinjaman', $r->id)->update([
            'id_mahasiswa' => $r->id_mahasiswa,
            'id_buku' => $r->id_buku,
            'tgl_pinjam' => $r->tgl_pinjam,
            'tgl_jatuh_tempo' => $tgl_jatuh_tempo,
        ]);
        return redirect('/pinjaman');
    }
    public function HapusPinjaman($id){
        PinjamanBuku::HapusPinjaman($id);
        return redirect('/pinjaman');
    }
    public function PinjamanSelesai($id){
        DB::table('pinjaman_buku')->where('id_pinjaman', $id)->update([
            'status_pengembalian' => 'Sudah Dikembalikan',
            'tgl_pengembalian' => date('Y-m-d')
        ]);
        return redirect('/pinjaman');
    }
}
