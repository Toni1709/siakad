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
        Schema::create('absensi_mahasiswa', function (Blueprint $table) {
            $table->increments('id_absensi');
            $table->string('id_kelas');
            $table->string('id_mahasiswa');
            $table->string('id_konsentrasi');
            $table->string('kehadiran');
            $table->date('tanggal_absensi');
            $table->string('id_mapel');
            $table->time('waktu_absensi');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('absensi_mahasiswa');
    }
};
