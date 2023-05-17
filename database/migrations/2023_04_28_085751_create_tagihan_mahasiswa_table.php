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
        Schema::create('tagihan_mahasiswa', function (Blueprint $table) {
            $table->increments('id_tagihan');
            $table->string('id_mahasiswa');
            $table->string('id_tahun_akademik');
            $table->string('bulan');
            $table->string('tahun');
            $table->string('tagihan');
            $table->string('bayar');
            $table->string('petugas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tagihan_mahasiswa');
    }
};
