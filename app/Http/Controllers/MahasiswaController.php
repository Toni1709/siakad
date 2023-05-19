<?php

namespace App\Http\Controllers;

use App\Models\AnggotaPerpustakaan;
use App\Models\BimbinganTa;
use App\Models\Dosen;
use App\Models\JadwalPelajaran;
use App\Models\Keuangan;
use App\Models\KKI;
use App\Models\Mahasiswa;
use App\Models\Nilai;
use App\Models\NonPendidikan;
use App\Models\PengajuanPembayaran;
use App\Models\PengajuanTa;
use App\Models\Pengumuman;
use App\Models\PinjamanBuku;
use App\Models\Semester;
use App\Models\Sidang;
use App\Models\TrackRecord;
use App\Models\Tugas;
use App\Models\UploadFile;
use Faker\Core\File;
use Illuminate\Http\File as HttpFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\VarDumper\Caster\RdKafkaCaster;

class MahasiswaController extends Controller
{
    public function Home(){
        $data['pengumuman'] = Pengumuman::PengumumanMahasiswa(Auth::user()->id);
        return view('front.mahasiswa.home', $data);
    }
    // ==========================================================================================//
    // Halaman
    public function Jadwal(){
        $data['jadwal'] = JadwalPelajaran::JadwalMahasiswa(Auth::user()->id_kelas);
        $data['jadwalall'] = JadwalPelajaran::JadwalMahasiswaall(Auth::user()->id_kelas);
        return view('front.mahasiswa.jadwal', $data);
    }
    public function Kehadiran(){
        $data['semester'] = Semester::DataSemester();
        $data['jadwal'] = JadwalPelajaran::JadwalPelajaranMahasiswa(Auth::user()->id);
        $data['absensi'] = DB::table('absensi_mahasiswa')
            ->where('id_mahasiswa',Auth::user()->id)
            ->get();
        $data['status_absensi'] = DB::table('jadwal_pelajaran')
            ->where('id_kelas', Auth::user()->id_kelas)
            ->where('aktif', 'aktif')
            ->first();
        $data['tagihan'] = Keuangan::tagihan(Auth::user()->id);
        // dd($data['tagihan']);
        return view('front.mahasiswa.kehadiran', $data);
    }
    public function Nilai(){
        $data['nilai'] = Nilai::NilaiMahasiswa(Auth::user()->id);
        return view('front.mahasiswa.nilai', $data);
    }
    public function Biodata(){
        $data['biodata'] = Mahasiswa::BiodataMahasiswa(Auth::user()->id);
        return view('front.mahasiswa.biodata', $data);
    }
    public function FormBiodata(){
        $data['biodata'] = Mahasiswa::BiodataMahasiswa(Auth::user()->id);
        return view('front.mahasiswa.form.edit_biodata', $data);
    }
    public function TrackRecord(){
        $data['ipk'] = TrackRecord::IPK(Auth::user()->id);
        $data['profil'] = Mahasiswa::BiodataMahasiswa(Auth::user()->id);
        $data['magang_kerja'] = TrackRecord::MagangKerja(Auth::user()->id);

        return view('front.mahasiswa.trackrecord', $data);
    }
    public function PengajuanPembayaran(){
        $data['data'] = Mahasiswa::BiodataMahasiswa(Auth::user()->id);
        $data['pengajuan'] = PengajuanPembayaran::PengajuanPembayaran(Auth::user()->id);
        return view('front.mahasiswa.pengajuan_pembayaran', $data);
    }
    public function NonPendidikan(){
        $data['biaya'] = NonPendidikan::BiayaNonPendidikanMahasiswa(Auth::user()->id);
        return view('front.mahasiswa.biaya_nonpendidikan', $data);
    }
    public function BimbinganKki(){
        $data['bimbingan'] = KKI::BimbinganKki(Auth::user()->id);
        return view('front.mahasiswa.bimbingan_kki', $data);
    }
    public function UploadSertifikat(){
        $data['data'] = Mahasiswa::BiodataMahasiswa(Auth::user()->id);
        $data['sertifikat'] = UploadFile::Sertifikat(Auth::user()->id);
        return view('front.mahasiswa.upload.sertifikat', $data);
    }
    public function UploadLaporanKki(){
        $data['data'] = Mahasiswa::BiodataMahasiswa(Auth::user()->id);
        $data['laporan'] = UploadFile::LaporanKki(Auth::user()->id);
        return view('front.mahasiswa.upload.laporan_kki', $data);
    }
    public function UploadNilaiKki(){
        $data['data'] = Mahasiswa::BiodataMahasiswa(Auth::user()->id);
        $data['nilai'] = UploadFile::NilaiKki(Auth::user()->id);
        return view('front.mahasiswa.upload.nilai_kki', $data);
    }
    public function UploadCv(){
        $data['data'] = Mahasiswa::BiodataMahasiswa(Auth::user()->id);
        $data['cv'] = UploadFile::Cv(Auth::user()->id);
        return view('front.mahasiswa.upload.cv', $data);
    }
    public function UploadRevisiLaporan(){
        $data['data'] = Mahasiswa::BiodataMahasiswa(Auth::user()->id);
        $data['laporan'] = UploadFile::RevisiLaporan(Auth::user()->id);
        return view('front.mahasiswa.upload.revisi_laporan', $data);
    }
    public function UploadTS(){
        $data['data'] = Mahasiswa::BiodataMahasiswa(Auth::user()->id);
        $data['ts'] = UploadFile::TrainingSoftSkill(Auth::user()->id);
        return view('front.mahasiswa.upload.ts', $data);
    }
    public function KartuAnggota(){
        $data['data'] = AnggotaPerpustakaan::Anggota(Auth::user()->id);
        return view('front.mahasiswa.kartu_anggota', $data);
    }
    public function RiwayatPinjaman(){
        $data['riwayat'] = PinjamanBuku::RiwayatPinjaman(Auth::user()->id);
        return view('front.mahasiswa.riwayat_pinjaman', $data);
    }
    public function PengajuanJudul(){
        $data['data'] = Mahasiswa::BiodataMahasiswa(Auth::user()->id);
        $data['dosen'] = Dosen::Dosen();
        $data['judul'] = PengajuanTa::PengajuanJudulMahasiswa(Auth::user()->id);
        $data['tagihan'] = Keuangan::tagihan(Auth::user()->id);
        // dd($data['data']);
        return view('front.mahasiswa.ta.pengajuan_judul', $data);
    }
    public function EntriBimbingan(){
        $data['bimbingan'] = BimbinganTa::BimbinganTa(Auth::user()->id);
        $data['judul'] = PengajuanTa::PengajuanJudulMahasiswa(Auth::user()->id);
        $data['tagihan'] = Keuangan::tagihan(Auth::user()->id);
        return view('front.mahasiswa.ta.bimbingan', $data);
    }
    public function DaftarSidang(){
        $data['data'] = Mahasiswa::BiodataMahasiswa(Auth::user()->id);
        $data['ta'] = PengajuanTa::PengajuanJudulMahasiswaAcc(Auth::user()->id);
        $data['judul'] = PengajuanTa::PengajuanJudulMahasiswa(Auth::user()->id);
        $data['daftar_sidang'] = Sidang::DaftarSidang(Auth::user()->id);
        $data['tagihan'] = Keuangan::tagihan(Auth::user()->id);
        return view('front.mahasiswa.ta.daftar_sidang', $data);
    }
    public function VerifikasiSidang(){
        $data['data'] = Mahasiswa::BiodataMahasiswa(Auth::user()->id);
        $data['ta'] = PengajuanTa::PengajuanJudulMahasiswaAcc(Auth::user()->id);
        $data['judul'] = PengajuanTa::PengajuanJudulMahasiswa(Auth::user()->id);
        $data['daftar_sidang'] = Sidang::DaftarSidang(Auth::user()->id);
        $data['verifikasi'] = Sidang::VerifikasiSidang(Auth::user()->id);
        $data['tagihan'] = Keuangan::tagihan(Auth::user()->id);
        // dd($data['verifikasi']);
        return view('front.mahasiswa.ta.verifikasi_sidang', $data);
    }
    public function tagihan(){
        $data['tagihan'] = Keuangan::tagihan(Auth::user()->id);
        // dd($data['tagihan']);
        return view('front.mahasiswa.tagihan', $data);
    }
    public function BiayaPendidikan(){
        $data['biaya'] = Keuangan::tagihanmahasiswa(Auth::user()->id);
        // dd($data['biaya']);
        return view('front.mahasiswa.biaya_pendidikan', $data);
    }
    public function tugas(){
        $data['tugas'] = Tugas::tugasmahasiswa(Auth::user()->id_kelas);
        return view('front.mahasiswa.tugas', $data);
    }
    // ==========================================================================================//
    // Proses Tambah
    public function TambahPengajuanPembayaran(Request $r){
        $file = $r->file('file');
        $filename = uniqid().'.'.$file->getClientOriginalExtension();
        $file->move('file', $filename);
        DB::table('pengajuan_pembayaran')->insert([
            'id_mahasiswa' => Auth::user()->id,
            'tgl_pengajuan' => date('Y-m-d'),
            'status_pengajuan' => 'Masih Diproses',
            'file' => $filename
        ]);
        return redirect()->back();
    }
    public function InputBimbinganKki(Request $r){
        DB::table('bimbingan_kki')->insert([
            'id_mahasiswa' => $r->id,
            'tgl_bimbingan' => $r->tgl,
            'catatan' => $r->catatan,
            'verifikasi' => 'Belum'
        ]);
        return redirect('/bimbingan/kki');
    }
    public function InputSertifikat(Request $r){
        $file = $r->file('file');
        $filename = uniqid().'.'.$file->getClientOriginalExtension();
        $file->move('berkas/sertifakat', $filename);

        DB::table('sertifikat_kki')->insert([
            'id_mahasiswa' => $r->id,
            'id_kelas' => $r->id_kelas,
            'file_sertifikat' => $filename
        ]);
        return redirect('kki/upload/sertifikat');
    }
    public function InputLaporan(Request $r){
        $file = $r->file('file');
        $filename = uniqid().'.'.$file->getClientOriginalExtension();
        $file->move('berkas/laporan', $filename);

        DB::table('file_laporan_kki')->insert([
            'id_mahasiswa' => $r->id,
            'id_kelas' => $r->id_kelas,
            'file_laporan' => $filename
        ]);
        return redirect('kki/upload/laporan');
    }
    public function InputNilai(Request $r){
        $file = $r->file('file');
        $filename = uniqid().'.'.$file->getClientOriginalExtension();
        $file->move('berkas/nilai', $filename);

        DB::table('file_nilai_kki')->insert([
            'id_mahasiswa' => $r->id,
            'id_kelas' => $r->id_kelas,
            'file_nilai' => $filename
        ]);
        return redirect('kki/upload/nilai');
    }
    public function InputCv(Request $r){
        $file = $r->file('file');
        $filename = uniqid().'.'.$file->getClientOriginalExtension();
        $file->move('berkas/cv', $filename);

        DB::table('file_cv')->insert([
            'id_mahasiswa' => $r->id,
            'id_kelas' => $r->id_kelas,
            'file_cv' => $filename
        ]);
        return redirect('kki/upload/cv');
    }
    public function InputRevisiLaporan(Request $r){
        $file = $r->file('file');
        $filename = uniqid().'.'.$file->getClientOriginalExtension();
        $file->move('berkas/laporan/revisi', $filename);

        DB::table('revisi_laporan_kki')->insert([
            'id_mahasiswa' => $r->id,
            'id_kelas' => $r->id_kelas,
            'file_rl' => $filename
        ]);
        return redirect('kki/upload/revisi_laporan');
    }
    public function InputTS(Request $r){
        $file = $r->file('file');
        $filename = uniqid().'.'.$file->getClientOriginalExtension();
        $file->move('berkas/laporan/revisi', $filename);

        DB::table('file_training_softskill')->insert([
            'id_mahasiswa' => $r->id,
            'id_kelas' => $r->id_kelas,
            'tss' => $r->tss,
            'verifikasi' => 'Belum',
            'file_ts' => $filename
        ]);
        return redirect('kki/upload/ts');
    }
    public function MahasiswaCheckIn($id){
        date_default_timezone_set('Asia/Jakarta');
        $id_kelas = DB::table('mahasiswa')->where('id', $id)->first();
        $id_konsentrasi = DB::table('kelas')->where('id_kelas', $id_kelas->id_kelas)->first();
        $id_mapel = DB::table('jadwal_pelajaran')->where('id_kelas', $id_kelas->id_kelas)->where('aktif', 'aktif')->first();
        $tagihan = Keuangan::tagihan(Auth::user()->id);
        if($tagihan->tagihan <= 0){
            $kehadiran = 'H';
        }else{
            $kehadiran = 'T';
        }
        DB::table('absensi_mahasiswa')->insert([
            'id_kelas' => $id_kelas->id_kelas,
            'id_mahasiswa' => $id,
            'id_konsentrasi' => $id_konsentrasi->id_konsentrasi,
            'id_mapel' => $id_mapel->id_mapel,
            'kehadiran' => $kehadiran,
            'tanggal_absensi' => date('Y-m-d'),
            'waktu_absensi' => date('H:i:s')
        ]);
        return redirect('/kehadiran');
    }
    public function AjukanJudul(Request $r){
        $file = $r->file('file');
        $filename = uniqid().'.'.$file->getClientOriginalExtension();
        $file->move('berkas/pengajuan_ta', $filename);

        $foto = $r->file('foto');
        $fotoname = uniqid().'.'.$file->getClientOriginalExtension();
        $foto->move('berkas/foto_ta', $fotoname);

        DB::table('pengajuan_ta')->insert([
            'id_mahasiswa' => Auth::user()->id,
            'pembimbing1' => $r->pembimbing1,
            'pembimbing2' => $r->pembimbing1,
            'judul' => $r->judul,
            'status_ta' => 'Menunggu Verifikasi',
            'tanggal' => date('Y-m-d'),
            'file' => $filename,
            'foto_ta' => $fotoname
        ]);
        return redirect('/ta/pengajuan_judul');
    }
    public function InputBimbinganTa(Request $request){
        DB::table('bimbingan_ta')->insert([
            'id_mahasiswa' => $request->id,
            'tgl_bimbingan' => $request->tgl,
            'bab' => $request->bab,
            'catatan' => $request->catatan,
            'verifikasi' => 'Belum'
        ]);
        return redirect('/ta/entribimbingan');
    }
    public function InputDaftarSidang(Request $r){
        $ijazah = $r->file('ijazah');
        $akte = $r->file('akte');
        $kk = $r->file('kk');
        $ser_ppm = $r->file('ser_ppm');
        $ser_seminar = $r->file('ser_seminar');
        $sertifikat = $r->file('sertifikat');

        $ijazahname = uniqid().'.'.$ijazah->getClientOriginalExtension();
        $aktename = uniqid().'.'.$akte->getClientOriginalExtension();
        $kkname = uniqid().'.'.$kk->getClientOriginalExtension();
        $ser_ppmname = uniqid().'.'.$ser_ppm->getClientOriginalExtension();
        $ser_seminarname = uniqid().'.'.$ser_seminar->getClientOriginalExtension();
        $sertifikatname = uniqid().'.'.$sertifikat->getClientOriginalExtension();

        $ijazah->move('berkas/syarat_sidang', $ijazahname);
        $akte->move('berkas/syarat_sidang', $aktename);
        $kk->move('berkas/syarat_sidang', $kkname);
        $ser_ppm->move('berkas/syarat_sidang', $ser_ppmname);
        $ser_seminar->move('berkas/syarat_sidang', $ser_seminarname);
        $sertifikat->move('berkas/syarat_sidang', $sertifikatname);

        DB::table('daftar_sidang')->insert([
            'id_mahasiswa' => Auth::user()->id,
            'id_ta' => $r->ta,
            'ijazah' => $ijazahname,
            'akte' => $aktename,
            'kk' => $kkname,
            'ser_ppm' => $ser_ppmname,
            'ser_seminar' => $ser_seminarname,
            'sertifikat' => $sertifikatname,
        ]);
        return redirect('ta/daftarsidang');
    }
    public function AjukanVerifikasiSidang(Request $r){
        $file = $r->file('file_ta');
        $filename = uniqid().'.'.$file->getClientOriginalExtension();
        $file->move('berkas/verifikasi_sidang', $filename);

        DB::table('verifikasi_sidang')->insert([
            'id_mahasiswa' => $r->mahasiswa,
            'id_ta' => $r->ta,
            'ta' => $filename
        ]);
        return redirect('/ta/verifikasi_sidang');
    }
    public function uploadtugas(Request $request){

        $file = $request->file('file');

        if($file){
            $filename = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move('berkas/tugas/mahasiswa', $filename);
            DB::table('upload_tugas')->insert([
                'id_mahasiswa' => $request->id_mahasiswa,
                'id_tugas' => $request->id_tugas,
                'file_tugas' => $filename,
                'date' => date('Y-m-d H:i:s')
            ]);
            return redirect('/mahasiswa/tugas');
        }else{
            return redirect()->back();
        }
    }
     // ==========================================================================================//
    // Proses Edit
    public function EditPassword(Request $r){
        $baru = $r->baru;
        $konfirmasi = $r->konfirmasi;

        if($baru == $konfirmasi){
            DB::table('mahasiswa')->where('id', Auth::user()->id)->update([
                'password' => Hash::make($baru)
            ]);
            return redirect()->back()->with('berhasil', 'Password Berhasil Diubah');
        }else{
            return redirect()->back()->with('gagal', 'Password yang Anda Masukkan Tidak Sama!');
        }
    }
    public function EditFoto(Request $r){
        $id = Auth::user()->id;
        $foto = $r->file('foto');
        $fotoname = uniqid().'.'.$foto->getClientOriginalExtension();
        $foto->move('berkas/profil', $fotoname);

        if($foto){
            DB::table('mahasiswa')->where('id', $id)->update([
                'foto' => $fotoname
            ]);
            return redirect()->back()->with('berhasil', 'Foto Berhasil Diubah!');
        }else{
            return redirect('/biodata');
        }
    }
    public function EDitBiodata(Request $r){
        if($r->persetujuan){
            DB::table('mahasiswa')->where('id', $r->id)->update([
                'nik' => $r->nik,
                'nim' => $r->nim,
                'nama_mahasiswa' => $r->nama,
                'tempat_lahir' => $r->tempat_lahir,
                'tgl_lahir' => $r->tgl_lahir,
                'provinsi' => $r->provinsi,
                'kabupaten' => $r->kabupaten,
                'kecamatan' => $r->kecamatan,
                'alamat' => $r->alamat,
                'email' => $r->email,
                'asal_sekolah' => $r->asal_sekolah,
                'jurusan' => $r->jurusan,
                'nama_ibu' => $r->nama_ibu,
                'nama_ayah' => $r->nama_ayah,
                'no_telp' => $r->no_telp,
                'no_hp' => $r->no_hp,
                'telp_ortu' => $r->telp_ortu,
                'jk' => $r->jk,
                'agama' => $r->agama,
                'gol_darah' => $r->gol_darah,
                'gol_darah' => $r->gol_darah,
                'status_kawin' => $r->status_kawin,
                'warga_negara' => $r->warga_negara,
            ]);
            return redirect('/biodata')->with('berhasil', 'Data Berhasil Diubah!');
        }else{
            return redirect('/biodata')->with('gagal', 'Kamu Belum Menyetujui Persetujuan Perubahan Data!');
        }
    }
    public function AjukanJudulUlang(Request $r){
        $file = $r->file('file');
        $filename = uniqid().'.'.$file->getClientOriginalExtension();
        $file->move('berkas/pengajuan_ta', $filename);

        $foto  = $r->file('foto');
        $fotoname = uniqid().'.'.$foto->getClientOriginalExtension();
        $foto->move('berkas/foto_ta', $fotoname);

        DB::table('pengajuan_ta')->where('id_ta', $r->id)->update([
            'pembimbing1' => $r->pembimbing1,
            'pembimbing2' => $r->pembimbing1,
            'judul' => $r->judul,
            'file' => $filename,
            'foto_ta' => $fotoname,
            'status_ta' => 'Menunggu Verifikasi',
            'tanggal' => date('Y-m-d')
        ]);
        return redirect('/ta/pengajuan_judul');
    }
    public function EditJudul(Request $r){
        DB::table('pengajuan_ta')->where('id_ta', $r->id)->update([
            'judul' => $r->judul
        ]);
        return redirect('/ta/pengajuan_judul');
    }
    // ==========================================================================================//
    // Proses Hapus
    public function HapusBimbinganKki($id){
        DB::table('bimbingan_kki')->where('id_bimbingankki', $id)->delete();
        return redirect('/bimbingan/kki');
    }
    // ==========================================================================================//

}
