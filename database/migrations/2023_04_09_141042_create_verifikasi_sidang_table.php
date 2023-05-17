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
        Schema::create('verifikasi_sidang', function (Blueprint $table) {
            $table->increments('id_ver_sidang');
            $table->string('id_mahasiswa');
            $table->string('id_ta');
            $table->string('ta');
            $table->string('ver_pembimbing')->nullable();
            $table->string('ver_prodi')->nullable();
            $table->string('ver_wadir')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('verifikasi_sidang');
    }
};
