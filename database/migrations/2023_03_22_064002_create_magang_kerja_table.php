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
        Schema::create('magang_kerja', function (Blueprint $table) {
            $table->increments('id_mk');
            $table->string('id_perusahaan');
            $table->string('tgl_mulai');
            $table->string('tgl_proses');
            $table->string('penempatan');
            $table->string('posisi');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('magang_kerja');
    }
};
