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
        Schema::create('karyawan', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nik');
            $table->string('nip');
            $table->string('nama_dosen');
            $table->string('jk_dosen');
            $table->string('tempat_lahir_dosen');
            $table->date('tgl_lahir_dosen');
            $table->string('posisi');
            $table->string('status_kepegawaian');
            $table->string('agama');
            $table->string('provinsi');
            $table->string('kecamatan');
            $table->string('kabupaten');
            $table->string('kelurahan');
            $table->text('alamat');
            $table->string('kodepos');
            $table->string('no_telp_dosen');
            $table->string('email');
            $table->string('foto')->nullable();
            $table->string('password');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('karyawan');
    }
};
