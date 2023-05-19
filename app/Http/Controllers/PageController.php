<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use App\Models\JadwalPelajaran;
use App\Models\Kelas;
use App\Models\Mahasiswa;
use App\Models\Nilai;
use App\Models\PengajuanTa;
use App\Models\Pengumuman;
use App\Models\Sidang;
use App\Models\Tugas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    public function Beranda(){
        $data['pengumuman'] = Pengumuman::PengumumanUmum();
        return view('front.home', $data);
    }

    public function Dashboard(){
        $data['jadwal'] = JadwalPelajaran::JadwalDosen();
        return view('front.dosen.dashboard', $data);
    }
    public function JadwalMengajar(){
        $data['jadwal'] = JadwalPelajaran::JadwalDosen();
        return view('front.dosen.jadwal', $data);
    }
    public function AbsensiKelas(){
        $data['kelas'] = JadwalPelajaran::JadwalDosen();
        return view('front.dosen.absensi', $data);
    }
    public function DetailAbsensiKelas($id){
        $data['mahasiswa'] = Mahasiswa::MahasiswaKelas($id);
        $data['k'] = JadwalPelajaran::AbsensiKelas($id);
        $data['absensi'] = Absensi::AbsensiKelas($id);
        return view('front.dosen.absensi_kelas', $data);
    }
    public function NilaiKelas(){
        $data['kelas'] = JadwalPelajaran::JadwalDosen();
        return view('front.dosen.nilai', $data);
    }
    public function DetailNilaiKelas($id){
        $data['mahasiswa'] = Mahasiswa::MahasiswaKelas($id);
        $data['k'] = JadwalPelajaran::AbsensiKelas($id);
        $data['nilai'] = Nilai::Nilai($id);
        // dd($data['kelas']);
        return view('front.dosen.nilai_kelas', $data);
    }
    public function Bimbingan(){
        $data['mahasiswa'] = PengajuanTa::MahasiswaBimbinganDosen(Auth::user()->id);
        return view('front.dosen.ta.bimbingan', $data);
    }
    public function VerifikasiSidang(){
        $data['verifikasi'] = Sidang::VerifikasiSidangDosen(Auth::user()->id);
        return view('front.dosen.ta.verifikasi_sidang', $data);
    }
    public function tugas(){
        $data['jadwal'] = JadwalPelajaran::JadwalDosen();
        $data['tugas'] = Tugas::datatugas();
        return view('front.dosen.tugas', $data);
    }
    public function detailtugas($id){
        $data['mahasiswa'] = Tugas::pengumpulantugas($id);
        return view('front.dosen.detail_tugas', $data);
    }
}
