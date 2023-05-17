<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mahasiswa', function (Blueprint $table) {
            $table->increments('id');
            $table->string('id_konsentrasi');
            $table->string('id_kelas');
            $table->string('nama_mahasiswa');
            $table->string('nim');
            $table->string('nik');
            $table->string('tempat_lahir');
            $table->date('tgl_lahir');
            $table->text('alamat');
            $table->string('provinsi');
            $table->string('kabupaten');
            $table->string('kecamatan');
            $table->string('no_telp');
            $table->string('no_hp');
            $table->string('email');
            $table->string('no_va')->nullable();
            $table->string('asal_sekolah');
            $table->string('jurusan');
            $table->string('jk');
            $table->string('agama');
            $table->string('gol_darah');
            $table->string('status_kawin');
            $table->string('warga_negara');
            $table->string('nama_ibu');
            $table->string('nama_ayah');
            $table->string('telp_ortu');
            $table->string('status');
            $table->string('email_plb')->nullable();
            $table->integer('angkatan');
            $table->string('foto')->nullable();
            $table->string('password');
            $table->rememberToken();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mahasiswa');
    }
};
