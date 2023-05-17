<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class EditAdminController extends Controller
{
    public function EditTahunAkademik(Request $request){
        DB::table('tahun_akademik')->where('id_tahun_akademik', $request->id)->update([
            'tahun_akademik' => $request->tahun
        ]);
        return redirect('/tahun_akademik');
    }
    public function EditGedung(Request $request){
        DB::table('gedung')->where('id_gedung', $request->kode)->update([
            'nama_gedung' => $request->gedung,
            'p' => $request->p,
            'l' => $request->l,
            't' => $request->t
        ]);
        return redirect('/gedung');
    }
    public function EditRuangan(Request $request){
        DB::table('ruangan')->where('id_ruangan', $request->kode)->update([
            'id_gedung' => $request->id_gedung,
            'nama_ruangan' => $request->ruangan,
            'kapasitas' => $request->kapasitas,
        ]);
        return redirect('/ruangan');
    }
    public function EditProdi(Request $request){
        DB::table('prodi')->where('id_prodi', $request->kode)->update([
            'nama_prodi' => $request->prodi,
        ]);
        return redirect('/jurusan');
    }
    public function EditKonsentrasi(Request $request){
        DB::table('konsentrasi')->where('id_konsentrasi', $request->kode)->update([
            'nama_konsentrasi' => $request->konsentrasi,
        ]);
        return redirect('/jurusan');
    }
    public function EditKelas(Request $request){
        DB::table('kelas')->where('id_kelas', $request->kode)->update([
            'id_konsentrasi' => $request->id_konsentrasi,
            'id_karyawan' => $request->id_karyawan,
            'nama_kelas' => $request->kelas,
        ]);
        return redirect('/kelas');
    }
    public function Edit_Mahasiswa(Request $request ){
        $id = $request->id;
        $foto = $request->file('foto');

        if($foto){
            $filename = uniqid().'.'.$foto->getClientOriginalExtension();
            $foto->move('image',$filename);

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
                'telp_ortu' => $request->telp_ortu,
                'status' => $request->status,
                'id_kelas' => $request->id_kelas,
                'id_konsentrasi' => $request->id_konsentrasi,
                'angkatan' => $request->angkatan,
                'foto' => $filename
            ]);
            redirect('/mahasiswa');
        }else{
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
                'telp_ortu' => $request->telp_ortu,
                'status' => $request->status,
                'id_kelas' => $request->id_kelas,
                'id_konsentrasi' => $request->id_konsentrasi,
                'angkatan' => $request->angkatan
            ]);
            redirect('/mahasiswa');
        }
    }
    public function EditAdmin(Request $request){
        $password = $request->password;
        $id = $request->id;

        if($password == ''){
            DB::table('users')->where('id', $id)->update([
                'name' => $request->name,
                'email' => $request->username,
                // 'password' => $request->password,
                'level' => $request->level,
                'no_telp' => $request->no_telp,
                'alamat' => $request->alamat
            ]);
            return redirect('/admin');
        }else{
            DB::table('users')->where('id', $id)->update([
                'name' => $request->name,
                'email' => $request->username,
                'password' => Hash::make($request->password),
                'level' => $request->level,
                'no_telp' => $request->no_telp,
                'alamat' => $request->alamat
            ]);
            return redirect('/admin');
        }
    }
    public function EditSemester(Request $request){
        DB::table('semester')->where('id_semester', $request->id)->update([
            'semester' => $request->semester,
            'ket' => $request->ket
        ]);
        return redirect('/semester');
    }
    public function EditJadwal(Request $request){
        DB::table('jadwal_pelajaran')->where('id_jadwal', $request->id)->update([
            'id_kelas' => $request->kelas,
            'id_karyawan' => $request->dosen,
            'id_semester' => $request->semester,
            'id_ruangan' => $request->ruangan,
            'id_mapel' => $request->mapel,
            'sks' => $request->sks,
            'hari' => $request->hari,
            'id_jam' => $request->jam
        ]);
        return redirect('/jadwal/tambah');
    }
    public function EditJadwal2(Request $request){
        DB::table('jadwal_pelajaran')->where('id_jadwal', $request->id)->update([
            'id_kelas' => $request->kelas,
            'id_karyawan' => $request->dosen,
            'id_semester' => $request->semester,
            'id_ruangan' => $request->ruangan,
            'id_mapel' => $request->mapel,
            'sks' => $request->sks,
            'hari' => $request->hari,
            'id_jam' => $request->jam
        ]);
        return redirect()->back();
    }
}
