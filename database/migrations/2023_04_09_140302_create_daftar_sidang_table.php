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
        Schema::create('daftar_sidang', function (Blueprint $table) {
            $table->increments('id_daftar_sidang');
            $table->string('id_mahasiswa');
            $table->string('id_ta');
            $table->string('ijazah');
            $table->string('akte');
            $table->string('kk');
            $table->string('ser_ppm');
            $table->string('ser_seminar');
            $table->string('sertifikat');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('daftar_sidang');
    }
};
