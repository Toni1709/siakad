<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use PHPUnit\Framework\Constraint\Count;

class TambahAdminController extends Controller
{
    public function TambahTahunAkademik(Request $request){
        DB::table('tahun_akademik')->insert([
            'tahun_akademik' => $request->tahun
        ]);
        return redirect('/tahun_akademik');
    }
    public function TambahGedung(Request $request){
        $p = $request->p;
        $l = $request->l;
        $t = $request->t;
        $luas = $p+$t+$l;
        DB::table('gedung')->insert([
            'id_gedung' => $request->kode,
            'nama_gedung' => $request->gedung,
            'p' => $request->p,
            'l' => $request->l,
            't' => $request->t,
            'luas' => $luas
        ]);
        return redirect('/gedung');
    }
    public function TambahRuangan(Request $request){
        DB::table('ruangan')->insert([
            'id_ruangan' => $request->kode,
            'id_gedung' => $request->id_gedung,
            'nama_ruangan' => $request->ruangan,
            'kapasitas' => $request->kapasitas,
        ]);
        return redirect('/ruangan');
    }
    public function TambahProdi(Request $request){
        DB::table('prodi')->insert([
            'id_prodi' => $request->kode,
            'nama_prodi' => $request->prodi,
        ]);
        return redirect('/jurusan');
    }
    public function TambahKonsentrasi(Request $request){
        DB::table('konsentrasi')->insert([
            'id_konsentrasi' => $request->kode,
            'id_prodi' => $request->id_prodi,
            'nama_konsentrasi' => $request->konsentrasi,
        ]);
        return redirect('/jurusan');
    }
    public function TambahKelas(Request $request){
        DB::table('kelas')->insert([
            'id_kelas' => $request->kode,
            'id_konsentrasi' => $request->id_konsentrasi,
            'id_karyawan' => $request->id_karyawan,
            'nama_kelas' => $request->kelas,
        ]);
        return redirect('/kelas');
    }
    public function TambahMahasiswa(Request $request){


            DB::table('mahasiswa')->insert([
                'nim' => $request->nim,
                'nama_mahasiswa' => $request->nama,
                'nik' => $request->nik,
                'tempat_lahir' => $request->tempat_lahir,
                'tgl_lahir' => $request->tgl_lahir,
                'no_telp' => $request->no_telp,
                'no_hp' => $request->no_hp,
                'email' => $request->email,
                'email_plb' => $request->email_plb,
                'asal_sekolah' => $request->asal_sekolah,
                'jurusan' => $request->jurusan,
                'provinsi' => $request->prov,
                'kabupaten' => $request->kab,
                'kecamatan' => $request->kec,
                'alamat' => $request->alamat,
                'no_va' => $request->no_va,
                'jk' => $request->jk,
                'agama' => $request->agama,
                'gol_darah' => $request->gol_darah,
                'status_kawin' => $request->status_kawin,
                'warga_negara' => $request->warga_negara,
                'nama_ibu' => $request->nama_ibu,
                'nama_ayah' => $request->nama_ayah,
                'telp_ortu' => $request->telp_ortu,
                'status' => $request->status,
                'id_kelas' => $request->id_kelas,
                'id_konsentrasi' => $request->id_konsentrasi,
                'angkatan' => $request->angkatan,
                'password' => Hash::make($request->nim)
            ]);
        //     return redirect('/mahasiswa');
        // }
        return redirect('/mahasiswa');

    }
    public function TambahDosen(Request $request){
        // $file = $request->file('foto');
        // // dd($file);
        // $filename = uniqid().'.'.$file->getClientOriginalExtension();
        // $file->move('gambar',$filename);

        DB::table('karyawan')->insert([
            'nip' => $request->nip,
            'nik' => $request->nik,
            'nama_dosen' => $request->nama,
            'tempat_lahir_dosen' => $request->tempat_lahir,
            'tgl_lahir_dosen' => $request->tgl_lahir,
            'no_telp_dosen' => $request->no_telp,
            'jk_dosen' => $request->jk,
            'email' => $request->email,
            'posisi' => $request->posisi,
            'status_kepegawaian' => $request->status,
            'agama' => $request->agama,
            'provinsi' => $request->prov,
            'kabupaten' => $request->kab,
            'kecamatan' => $request->kec,
            'kelurahan' => $request->kelurahan,
            'kodepos' => $request->kode_pos,
            'alamat' => $request->alamat,
            'password' => Hash::make($request->nip)
        ]);
        return redirect('/dosen');
    }
    public function TambahAdmin(Request $request){
        DB::table('users')->insert([
            'name' => $request->name,
            'email' => $request->username,
            'password' => Hash::make($request->password),
            'level' => $request->level,
            'no_telp' => $request->no_telp,
            'alamat' => $request->alamat
        ]);
        return redirect('/admin');
    }
    public function TambahJam(Request $request){
        DB::table('jam_pelajaran')->insert([
            'tahun' => $request->tahun,
            'jam_mulai' => $request->jam_mulai,
            'jam_selesai' => $request->jam_selesai
        ]);
        return redirect('/jam');
    }
    public function TambahMapel(Request $request){
        DB::table('mata_pelajaran')->insert([
            'nama_mapel' => $request->mapel
        ]);
        return redirect('/mapel');
    }
    public function Tambahjadwal(Request $request){
        DB::table('jadwal_pelajaran')->insert([
            'id_kelas' => $request->kelas,
            'id_karyawan' => $request->dosen,
            'id_semester' => $request->semester,
            'id_ruangan' => $request->ruangan,
            'id_mapel' => $request->mapel,
            'sks' => $request->sks,
            'hari' => $request->hari,
            'id_jam' => $request->jam,
            'aktif' => 'non aktif'
        ]);
        return redirect('/jadwal/tambah');
    }
    public function TambahSemester(Request $request){
        DB::table('semester')->insert([
            'semester' => $request->semester,
            'ket' => $request->ket
        ]);
        return redirect('/semester');
    }
    public function TambahAbsensi(Request $request){
        $mahasiswa = count($request->mahasiswa);
        for($i = 1; $i <= $mahasiswa; $i++){
            DB::table('absensi_mahasiswa')->insert([
                'id_mahasiswa' => $request->mahasiswa[$i],
                'kehadiran' => $request->kehadiran[$i],
                'tanggal_absensi' => $request->tgl,
                'id_kelas' => $request->kelas,
                'id_konsentrasi' => $request->konsentrasi,
                'id_mapel' => $request->mapel
            ]);
        }
        return redirect()->back();
    }
    public function EditAbsensi(Request $request){
        $mahasiswa = count($request->mahasiswa);
        for($i = 1; $i <= $mahasiswa; $i++){
            DB::table('absensi_mahasiswa')->where('id_absensi', $request->id[$i])->update([
                'kehadiran' => $request->kehadiran[$i],
            ]);
        }
        return redirect()->back();
    }
    public function TambahPengumuman(Request $r){
        DB::table('pengumuman')->insert([
            'judul_pengumuman' => $r->judul,
            'isi_pengumuman' => $r->isi,
            'tgl_pengumuman' => date('Y-m-d'),
            'tujuan' => $r->tujuan
        ]);
        return redirect('/pengumuman');
    }
    public function EditPengumuman(Request $r){
        DB::table('pengumuman')->where('id_pengumuman', $r->id)->update([
            'judul_pengumuman' => $r->judul,
            'isi_pengumuman' => $r->isi,
            'tujuan' => $r->tujuan
        ]);
        return redirect('/pengumuman');
    }
    public function TugasAkhirAcc(Request $r){
        DB::table('pengajuan_ta')->where('id_ta', $r->id)->update([
            'pembimbing2' => $r->pembimbing2,
            'catatan' => $r->catatan,
            'status_ta' => 'ACC'
        ]);
        return redirect('/tugas_akhir/pengajuan_proposal');
    }
    public function TugasAkhirTolak($id){
        DB::table('pengajuan_ta')->where('id_ta', $id)->update([
            'status_ta' => 'Ditolak'
        ]);
        return redirect('/tugas_akhir/pengajuan_proposal');
    }
}
