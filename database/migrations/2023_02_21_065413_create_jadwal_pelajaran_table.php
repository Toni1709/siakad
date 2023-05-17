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
        Schema::create('jadwal_pelajaran', function (Blueprint $table) {
            $table->increments('id_jadwal');
            $table->string('id_karyawan');
            $table->string('id_kelas');
            $table->string('id_ruangan');
            $table->string('id_mapel');
            $table->integer('sks');
            $table->string('hari');
            $table->string('id_jam');
            $table->string('id_semester');
            $table->string('aktif');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jadwal_pelajaran');
    }
};
