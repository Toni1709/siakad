<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AjaxController;
use App\Http\Controllers\CnPController;
use App\Http\Controllers\EditAdminController;
use App\Http\Controllers\EditController;
use App\Http\Controllers\HapusAdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KeuanganController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\PageAdminController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PerpustakaanController;
use App\Http\Controllers\TambahAdminController;
use App\Http\Controllers\TambahController;
use App\Models\Mahasiswa;
use Illuminate\Support\Facades\Route;
use Psy\Command\EditCommand;
use Symfony\Component\HttpKernel\DataCollector\AjaxDataCollector;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::controller(HomeController::class)->group(function (){
    Route::get('/', 'Index')->name('index');
    Route::get('/login', 'Login');
});
// ============================================================================================================================//
// Backend
Route::get('/log_admin', function () {
    return view('login.login_admin');
})->name('login');

Route::controller(LoginController::class)->group(function (){
    // Backend
    Route::post('/postlogin', 'postlogin')->name('postlogin');
    Route::post('/logout', 'logout')->name('logout');
    // Frontend
    Route::post('/postlogin2', 'postlogin2')->name('postlogin2');
    Route::post('/logout2', 'logout2')->name('logout2');
});
Route::group(['middleware' => ['auth:user']], function(){
    Route::get('/home_admin', [HomeController::class, 'home_admin']);
    // ===========================================================================================//
    // Tahun Akademik
    Route::get('/tahun_akademik', [PageAdminController::class, 'TahunAkademik']);
    Route::get('tahun_akademik/tambah', [TambahAdminController::class, 'TambahTahunAkademik']);
    Route::get('tahun_akademik/edit', [EditAdminController::class, 'EditTahunAkademik']);
    Route::get('tahun_akademik/hapus/{id_tahun_akademik}', [HapusAdminController::class, 'HapusTahunAkademik']);
    // ===========================================================================================//
    // Gedung
    Route::get('/gedung', [PageAdminController::class, 'Gedung']);
    Route::get('/gedung/tambah', [TambahAdminController::class, 'TambahGedung']);
    Route::get('/gedung/edit', [EditAdminController::class, 'EditGedung']);
    Route::get('/gedung/hapus/{id_gedung}', [HapusAdminController::class, 'hapusGedung']);
    // ===========================================================================================//
    // Ruangan
    Route::get('/ruangan', [PageAdminController::class, 'Ruangan']);
    Route::get('/ruangan/tambah', [TambahAdminController::class, 'TambahRuangan']);
    Route::get('/ruangan/edit', [EditAdminController::class, 'EditRuangan']);
    // ===========================================================================================//
    // Jurusan
    Route::get('/jurusan', [PageAdminController::class, 'Jurusan']);
    Route::get('/prodi/tambah', [TambahAdminController::class, 'TambahProdi']);
    Route::get('/prodi/edit', [EditAdminController::class, 'EditProdi']);
    Route::get('/prodi/hapus/{id_prodi}', [HapusAdminController::class, 'HapusProdi']);
    Route::get('/konsentrasi/tambah', [TambahAdminController::class, 'TambahKonsentrasi']);
    Route::get('/konsentrasi/hapus/{id_konsentrasi}', [HapusAdminController::class, 'HapusKonsentrasi']);
    // ===========================================================================================//
    // Kelas
    Route::get('/kelas', [PageAdminController::class, 'Kelas']);
    Route::get('/kelas/tambah', [TambahAdminController::class, 'TambahKelas']);
    Route::get('/kelas/edit', [EditAdminController::class, 'EditKelas']);
    Route::get('/kelas/hapus/{id_kelas}', [HapusAdminController::class, 'HapusKelas']);
    // ===========================================================================================//
    // Semester
    Route::get('/semester', [PageAdminController::class, 'Semester']);
    Route::post('/semester/tambah', [TambahAdminController::class, 'TambahSemester']);
    Route::post('/semester/edit', [EditAdminController::class, 'EditSemester']);
    Route::get('/semester/hapus/{id}', [HapusAdminController::class, 'HapusSemester']);
    // ===========================================================================================//
    // Mahasiswa
    Route::get('/mahasiswa', [PageAdminController::class, 'Mahasiswa']);
    Route::get('/tambah_mahasiswa', [PageAdminController::class, 'Tambah_Mahasiswa']);
    Route::post('/mahasiswa/tambah', [TambahAdminController::class, 'TambahMahasiswa']);
    Route::get('/tambah_mahasiswa/ajax', [AjaxController::class, 'AmbilDataKelas'])->name('kelas');
    Route::get('/mahasiswa/hapus/{id_mahasiswa}', [HapusAdminController::class, 'HapusMahasiswa']);
    Route::get('/edit_mahasiswa/{id}', [PageAdminController::class, 'Edit_Mahasiswa']);
    Route::post('mahasiswa/edit', [EditAdminController::class, 'EditMahasiswa']);
    // ===========================================================================================//
    // Dosen
    Route::get('/dosen', [PageAdminController::class, 'Dosen']);
    Route::get('/tambah_dosen', [PageAdminController::class, 'TambahDosen']);
    Route::post('/dosen/tambah', [TambahAdminController::class, 'TambahDosen']);
    // ===========================================================================================//
    // Administrator
    Route::get('/admin', [PageAdminController::class, 'Admin']);
    Route::post('/admin/tambah', [TambahAdminController::class, 'TambahAdmin']);
    Route::post('/admin/edit', [EditAdminController::class, 'EditAdmin']);
    Route::get('/admin/hapus/{id}', [HapusAdminController::class, 'HapusAdmin']);
    // ===========================================================================================//
    // Jam Pelajaran
    Route::get('/jam', [PageAdminController::class, 'Jam']);
    Route::post('/jam/tambah', [TambahAdminController::class, 'TambahJam']);
    Route::get('/mapel', [PageAdminController::class, 'Mapel']);
    Route::post('/mapel/tambah', [TambahAdminController::class, 'TambahMapel']);
    // ===========================================================================================//
    // Jadwal Pelajaran
    Route::get('/jadwal_pelajaran', [PageAdminController::class, 'JadwalPelajaran']);
    Route::get('/jadwal_pelajaran/{id_kelas}', [PageAdminController::class, "JadwalKelas"]);
    Route::get('/jadwal/tambah', [PageAdminController::class, "TambahJadwal"]);
    Route::post('/tambah_jadwal', [TambahAdminController::class, 'TambahJadwal']);
    Route::get('/jadwal/hapus/{id}', [HapusAdminController::class, 'HapusJadwal']);
    Route::get('/jadwal_pelajaran/hapus/{id}', [HapusAdminController::class, 'HapusJadwalPelajaran']);
    Route::post('/edit_jadwal', [EditAdminController::class, 'EditJadwal']);
    Route::post('/edit_jadwal2', [EditAdminController::class, 'EditJadwal2']);
    Route::get('/jadwal_dosen', [PageAdminController::class, 'JadwalDosen']);
    // ===========================================================================================//
    // Absensi
    Route::get('/absensi_mahasiswa', [PageAdminController::class, "AbsenMahasiswa"]);
    Route::get('/absensi/{id}', [PageAdminController::class, 'AbsensiKelas']);
    Route::get('/data/{id?}', [AjaxController::class, 'DataKelas'])->name('data');
    Route::post('/absensi/tambah', [TambahAdminController::class, 'TambahAbsensi']);
    Route::post('/absensi/edit', [TambahAdminController::class, 'EditAbsensi']);
    // Pengumuman
    Route::get('/pengumuman', [PageAdminController::class, 'Pengumuman']);
    Route::get('/pengumuman/formtambah', [PageAdminController::class, 'FormPengumuman']);
    Route::get('/pengumuman/formedit/{id}', [PageAdminController::class, 'Form2Pengumuman']);
    Route::post('/pengumuman/tambah', [TambahAdminController::class, 'TambahPengumuman']);
    Route::post('/pengumuman/edit', [TambahAdminController::class, 'EditPengumuman']);
    Route::get('/pengumuman/hapus/{id}', [HapusAdminController::class, 'HapusPengumuman']);
    // Tugas Akhir
    Route::get('/tugas_akhir/pengajuan_proposal', [PageAdminController::class, 'PengajuanProposal']);
    Route::post('/tugas_akhir/acc', [TambahAdminController::class, 'TugasAkhirAcc']);
    Route::get('/tugas_akhir/tolak/{id}', [TambahAdminController::class, 'TugasAkhirTolak']);
    // ===========================================================================================//
    // ===========================================================================================//
    // Keuangan
    // ===========================================================================================//
    // Pengajuan Pembayaran
    Route::get('/pengajuan/pembayaran', [KeuanganController::class, 'PengajuanPembayaran']);
    Route::get('/status_pengajuan/setuju/{id}', [KeuanganController::class, 'StatusSetuju']);
    Route::get('/status_pengajuan/tolak/{id}', [KeuanganController::class, 'StatusTolak']);
    Route::get('/keuangan/kelas', [KeuanganController::class, 'Kelas']);
    Route::get('/keuangan/datakelas/{id}', [KeuanganController::class, 'DataKelas']);
    Route::get('/keuangan/tagihan/{id}', [KeuanganController::class, 'Tagihan']);
    Route::get('/master/tagihan', [KeuanganController::class, 'MasterTagihan']);
    // biaya non pendidikan
    Route::get('/biaya/nonpendidikan', [KeuanganController::class, 'NonPendidikan']);
    Route::get('/biaya/nonpendidikan/tambah', [KeuanganController::class, 'FormTambahNonPendidikan']);

    Route::post('/master/tagihan/tambah', [KeuanganController::class, 'TambahMasterTagihan']);
    Route::post('/biaya/nonakademik/tambah', [KeuanganController::class, 'TambahNonPendidikan']);
    Route::post('/biaya/nonakademik/edit', [KeuanganController::class, 'EditNonPendidikan']);
    Route::post('/tagihan/bayar', [KeuanganController::class, 'BayarTagihan']);

    Route::get('/master/tagihan/hapus/{id}', [KeuanganController::class, 'HapusMasterTagihan']);
    // ===========================================================================================//
    // ===========================================================================================//
    // C&P
    // ===========================================================================================//
    //Perusahaan
    Route::get('/perusahaan', [CnPController::class, 'Perusahaan']);
    Route::post('/perusahaan/tambah', [CnPController::class, 'TambahPerusahaan']);
    Route::post('/perusahaan/edit', [CnPController::class, 'EditPerusahaan']);
    Route::get('/perusahaan/hapus/{id}', [CnPController::class, 'HapusPerusahaan']);
    // Mahasiswa Magang
    Route::get('/magang_kerja', [CnPController::class, 'MagangKerja']);
    Route::post('/magang_kerja/tambah', [CnPController::class, 'TambahMagangKerja']);
    Route::post('/magang_kerja/edit', [CnPController::class, 'EditMagangKerja']);
    Route::get('/magang_kerja/hapus/{id}', [CnPController::class, 'HapusMagangKerja']);
    // Berkas Mahasiswa
    Route::get('/berkas/sertifikat', [CnPController::class, 'Sertifikat']);
    Route::get('/berkas/laporan_kki', [CnPController::class, 'LaporanKKI']);
    Route::get('/berkas/nilai_kki', [CnPController::class, 'NilaiKki']);
    Route::get('/berkas/revisi_laporan', [CnPController::class, 'RevisiLaporan']);
    Route::get('/berkas/curriculum_vitae', [CnPController::class, 'Cv']);
    Route::get('/berkas/sertifikat/hapus/{id}', [CnPController::class, 'HapusSertifikat']);
    Route::get('/berkas/laporan/hapus/{id}', [CnPController::class, 'HapusLaporan']);
    Route::get('/berkas/nilai/hapus/{id}', [CnPController::class, 'HapusNilaiKki']);
    Route::get('/berkas/revisi_laporan/hapus/{id}', [CnPController::class, 'HapusRevisiLaporan']);
    Route::get('/berkas/cv/hapus/{id}', [CnPController::class, 'HapusCv']);
    // ===========================================================================================//
    // Perpustakaan
    // ===========================================================================================//
    // Jenis Buku
    Route::get('/jenis_buku', [PerpustakaanController::class, 'JenisBuku']);
    Route::post('/jenis_buku/tambah', [PerpustakaanController::class, 'TambahJenisBuku']);
    Route::post('/jenis_buku/edit', [PerpustakaanController::class, 'EditJenisBuku']);
    Route::get('/jenis_buku/hapus/{id}', [PerpustakaanController::class, 'HapusJenisBuku']);
    // Daftar Buku
    Route::get('/daftar_buku', [PerpustakaanController::class, 'DaftarBuku']);
    Route::post('/daftar_buku/tambah', [PerpustakaanController::class, 'TambahDaftarBuku']);
    Route::post('/daftar_buku/edit', [PerpustakaanController::class, 'EditDaftarBuku']);
    Route::get('/daftar_buku/hapus/{id}', [PerpustakaanController::class, 'HapusDaftarBuku']);
    // Keanggotaan
    Route::get('/keanggotaan', [PerpustakaanController::class, 'Keanggotaan']);
    Route::get('/keanggotaan/form', [PerpustakaanController::class, 'FormKeanggotaan']);
    Route::get('/keanggotaan/formedit/{id}', [PerpustakaanController::class, 'FormEditKeanggotaan']);
    Route::post('/keanggotaan/tambah', [PerpustakaanController::class, 'TambahKeanggotaan']);
    Route::post('/keanggotaan/edit', [PerpustakaanController::class, 'EditKeanggotaan']);
    Route::get('/keanggotaan/hapus/{id}', [PerpustakaanController::class, 'HapusKeanggotaan']);
    // Pinjaman Buku
    Route::get('/pinjaman', [PerpustakaanController::class, 'Pinjaman']);
    Route::get('/pinjaman/form', [PerpustakaanController::class, 'FormPinjaman']);
    Route::get('/pinjaman/form/edit/{id}', [PerpustakaanController::class, 'FormEditPinjaman']);
    Route::post('/pinjaman/tambah', [PerpustakaanController::class, 'TambahPinjaman']);
    Route::post('/pinjaman/edit', [PerpustakaanController::class, 'EditPinjaman']);
    Route::get('/pinjaman/hapus/{id}', [PerpustakaanController::class, 'HapusPinjaman']);
    Route::get('/pinjaman/selesai/{id}', [PerpustakaanController::class, 'PinjamanSelesai']);
    // ===========================================================================================//



});
// ============================================================================================================================//
// Frontend
Route::get('/beranda', [PageController::class, 'Beranda']);
Route::group(['middleware' => ['auth:dosen']], function(){

    Route::get('/home_dosen', [HomeController::class, 'HomeDosen']);

    Route::controller(PageController::class)->group(function () {
        Route::get('/dashboard', 'Dashboard');
        Route::get('/jadwal_mengajar', 'JadwalMengajar');
        Route::get('/bimbingan', 'Bimbingan');
        Route::get('/sidang/verifikasi', 'VerifikasiSidang');
        Route::get('/tugas', 'tugas');
        Route::get('/absensi_kelas', 'AbsensiKelas');
        Route::get('/nilai_kelas', 'NilaiKelas');
        Route::get('/absensi/kelas/{id}', 'DetailAbsensiKelas');
        Route::get('/nilai/kelas/{id}', 'DetailNilaiKelas');
    });
    Route::controller(TambahController::class)->group(function () {
        Route::post('/absensi/input', 'InputAbsensi');
        Route::post('/tugas/tambah', 'tugas');
        Route::post('/nilai/tambah', 'TambahNilai');
    });
    Route::controller(EditController::class)->group(function (){
        Route::get('/absensi_kelas/aktif/{id}', 'EditJadwalKelasAktif');
        Route::get('/absensi_kelas/nonaktif/{id}', 'EditJadwalKelasNonAktif');
        Route::post('/absensi/update', 'UpdateAbsensi');
        Route::post('/nilai/update', 'UpdateNilai');
        Route::post('/bimbingan/verifikasi', 'VerifikasiBimbinganTa');
        Route::post('/bimbingan/verifikasi', 'VerifikasiBimbinganTa');
        Route::get('/verifikasi/sidang/{id}', 'VerifikasiSidang');
    });
});
Route::group(['middleware' => ['auth:mahasiswa']], function(){

    Route::get('home_mahasiswa', [HomeController::class, 'HomeMahasiswa']);

    Route::controller(MahasiswaController::class)->group(function () {

        Route::get('/home', 'Home');
        // ===============================================================================//
        // Pages
        Route::get('/biodata', 'Biodata');
        Route::get('/biodata/edit', 'FormBiodata');
        Route::get('/jadwal', 'Jadwal')->name('jadwal_mahasiswa');
        Route::get('/kehadiran', 'Kehadiran');
        Route::get('/nilai', 'nilai');
        Route::get('/trackrecord', 'Trackrecord');
        Route::get('/pengajuan_pembayaran', 'PengajuanPembayaran');
        Route::get('/realisasi/nonpendidikan', 'NonPendidikan');
        Route::get('/bimbingan/kki', 'BimbinganKki');
        Route::get('/kki/upload/sertifikat', 'UploadSertifikat');
        Route::get('/kki/upload/laporan', 'UploadLaporanKki');
        Route::get('/kki/upload/nilai', 'UploadNilaiKki');
        Route::get('/kki/upload/cv', 'UploadCv');
        Route::get('/kki/upload/revisi_laporan', 'UploadRevisiLaporan');
        Route::get('/kki/upload/ts', 'UploadTS');
        Route::get('/kartu_anggota', 'KartuAnggota');
        Route::get('/riwayat_pinjaman', 'RiwayatPinjaman');
        Route::get('/ta/pengajuan_judul', 'PengajuanJudul');
        Route::get('/ta/entribimbingan', 'EntriBimbingan');
        Route::get('/ta/daftarsidang', 'DaftarSidang');
        Route::get('/ta/verifikasi_sidang', 'verifikasi_sidang');
        Route::get('/tagihan_mahasiswa', 'tagihan');
        Route::get('/realisasi/pendidikan', 'BiayaPendidikan');
        Route::get('/mahasiswa/tugas', 'tugas');
        // ===============================================================================//
        // Input
        Route::post('/pengajuan_pembayaran/tambah', 'TambahPengajuanPembayaran');
        Route::post('/bimbingan/kki/input', 'InputBimbinganKki');
        Route::post('/kki/sertifikat/input', 'InputSertifikat');
        Route::post('/kki/laporan/input', 'InputLaporan');
        Route::post('/kki/nilai/input', 'InputNilai');
        Route::post('/kki/cv/input', 'InputCv');
        Route::post('/kki/revisi_laporan/input', 'InputRevisiLaporan');
        Route::post('/kki/ts/input', 'InputTS');
        Route::post('/absensi/mahasiswa/checkin/{id}', 'MahasiswaCheckIn');
        Route::post('/ta/pengajuan_judul/ajukan', 'AjukanJudul');
        Route::post('/ta/entribimbingan/input', 'InputBimbinganTa');
        Route::post('/ta/daftarsidang/daftar', 'InputDaftarSidang');
        Route::post('/ta/verifikasi_sidang/ajukan', 'AjukanVerifikasiSidang');
        // ===============================================================================//
        // Update
        Route::post('/biodata/edit/password', 'EditPassword');
        Route::post('/biodata/edit/foto', 'EditFoto');
        Route::post('/biodata/edit', 'EditBiodata');
        Route::post('/ta/pengajuan_judul/edit', 'AjukanJudulUlang');
        Route::post('/ta/edit/judul', 'EditJudul');
        // ===============================================================================//
        // Delete
        Route::get('/bimbingan/kki/hapus/{id}', 'HapusBimbinganKki');
    });
    Route::get('/kehadiran/ajax/{id?}', [AjaxController::class, 'Kehadiran'])->name('kehadiran');
});
