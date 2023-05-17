<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use App\Models\Admin;
use App\Models\Dosen;
use App\Models\Gedung;
use App\Models\JadwalPelajaran;
use App\Models\Jam_Pelajaran;
use App\Models\Kelas;
use App\Models\Konsentrasi;
use App\Models\Mahasiswa;
use App\Models\Mapel;
use App\Models\PengajuanTa;
use App\Models\Pengumuman;
use App\Models\Prodi;
use App\Models\Ruangan;
use App\Models\Semester;
use App\Models\TahunAkademik;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PageAdminController extends Controller
{
    public function TahunAkademik(){
        $tahun_akademik = TahunAkademik::all();

        return view('admin.tahun_akademik',[
            'tahun_akademik' => $tahun_akademik
        ]);
    }
    public function Gedung(){
        $kode = Gedung::kode();
        $gedung = Gedung::all();

        return view('admin.gedung',[
            'kode' => $kode,
            'gedung' => $gedung
        ]);
    }
    public function Ruangan(){
        $kode = Ruangan::kode();
        $pilih_gedung = Gedung::all();
        $ruangan = Ruangan::DataRuangan();

        return view('admin.ruangan',[
            'kode' => $kode,
            'pilih_gedung' => $pilih_gedung,
            'ruangan' => $ruangan
        ]);
    }
    public function Semester(){
        $data['semester'] = Semester::DataSemester();

        return view('admin.semester', $data);
    }
    public function Jurusan(){
        $prodi = Prodi::all();
        $konsentrasi = Konsentrasi::DataKonsentrasi();

        return view('admin.jurusan', [
            'prodi' => $prodi,
            'konsentrasi' => $konsentrasi
        ]);
    }
    public function Kelas(){
        $data_konsentrasi = Konsentrasi::all();
        $kelas = Kelas::DataKelas();
        $jumlahMahasiswa = Kelas::JumlahMahasiswa();
        $dataPA = Dosen::all();



        return view('admin.kelas', [
            'data_konsentrasi' => $data_konsentrasi,
            'kelas' => $kelas,
            // 'jumlah_mahasiswa' => $jumlahMahasiswa,
            'dataPA' => $dataPA
        ]);
    }
    public function Mahasiswa(){
        $mahasiswa = Mahasiswa::DataMahasiswa();

        return view('admin.mahasiswa.mahasiswa', [
            'mahasiswa' => $mahasiswa
        ]);
    }
    public function Tambah_Mahasiswa(){
        $kelas = Kelas::all();
        $jurusan = Konsentrasi::DataKonsentrasi();

        return view('admin.mahasiswa.tambah_mahasiswa', [
            'kelas' => $kelas,
            'jurusan' => $jurusan
        ]);
    }
    public function Edit_Mahasiswa($id){
        $mahasiswa = Mahasiswa::EditMahasiswa($id);
        // dd($mahasiswa);
        return view('admin.mahasiswa.edit_mahasiswa', [
            'mahasiswa' => $mahasiswa
        ]);
    }
    public function Dosen(){
        $dosen  = Dosen::all();

        return view('admin.dosen.dosen', [
            'dosen' => $dosen
        ]);
    }
    public function TambahDosen(){
        return view('admin.dosen.tambah_dosen');
    }
    public function Admin(){
        $admin = Admin::all();

        return view('admin.administrator.admin', [
            'admin' => $admin
        ]);
    }
    public function Jam(){
        $jam = Jam_Pelajaran::all();

        return view('admin.akademik.jam', [
            'jam' => $jam
        ]);
    }
    public function Mapel(){
        $mapel = Mapel::all();

        return view('admin.akademik.mapel',[
            'mapel' => $mapel
        ]);
    }
    public function JadwalPelajaran(){
        $kelas2 = Kelas::DataKelas2();

        // dd($kelas);
        return view('admin.akademik.jadwal_pelajaran',[
            'kelas2' => $kelas2
        ]);
    }
    public function JadwalKelas($id_kelas){
        $data['kelas'] = Kelas::DataKelas3($id_kelas);
        $data['jadwal'] = JadwalPelajaran::JadwalPelajaranKelas($id_kelas);
        $data['ruangan'] = Ruangan::Ruangan();
        $data['mapel'] = Mapel::Mapel();
        $data['jam'] = Jam_Pelajaran::Jam();
        $data['dosen'] = Dosen::Dosen();
        $data['semester'] = Semester::DataSemester();
        // dd($kelas);
        return view('admin.akademik.detail_jadwal', $data);
    }
    public function JadwalDosen(){
        $data['jadwal'] = JadwalPelajaran::JadwalMengajarDosen();
        return view('admin.dosen.jadwal_dosen', $data);
    }
    public function TambahJadwal(){
        $data['kelas'] = Kelas::kelas();
        $data['ruangan'] = Ruangan::Ruangan();
        $data['mapel'] = Mapel::Mapel();
        $data['jam'] = Jam_Pelajaran::Jam();
        $data['dosen'] = Dosen::Dosen();
        $data['jadwal'] = JadwalPelajaran::JadwalPelajaran();
        $data['semester'] = Semester::DataSemester();

        return view('admin.akademik.form_jadwal', $data);
    }
    public function AbsenMahasiswa(){
        $data['kelas'] = Kelas::DataKelas2();
        return view('admin.absensi.mahasiswa', $data);
    }

    public function AbsensiKelas($id){
        $data['kelas'] = Absensi::DataPelajaranAbsensi($id);
        $data['mahasiswa'] = Mahasiswa::MahasiswaKelas($id);
        $data['absensi'] = Absensi::AbsensiKelas($id);

        // dd($data['mahasiswa']);

        return view('admin.absensi.detail_absensi', $data);
    }
    public function Pengumuman(){
        $data['pengumuman'] = Pengumuman::Pengumuman();
        return view('admin.pengumuman.index', $data);
    }
    public function FormPengumuman(){
        return view('admin.pengumuman.form.tambah');
    }
    public function Form2Pengumuman($id){
        $data['pengumuman'] = Pengumuman::DetailPengumuman($id);
        return view('admin.pengumuman.form.edit', $data);
    }
    public function PengajuanProposal(){
        $data['judul'] = PengajuanTa::DataPengajuanJudul();
        $data['dosen'] = Dosen::Dosen();
        // dd($data['dosen']);
        return view('admin.ta.pengajuan_proposal', $data);
    }
}
