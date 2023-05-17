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
        Schema::create('daftar_buku', function (Blueprint $table) {
            $table->increments('id_buku');
            $table->string('id_jenis_buku');
            $table->string('judul_buku');
            $table->string('penerbit');
            $table->string('tahun_terbit');
            $table->string('jumlah_buku');
            $table->string('tanggal_masuk');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('daftar_buku');
    }
};
