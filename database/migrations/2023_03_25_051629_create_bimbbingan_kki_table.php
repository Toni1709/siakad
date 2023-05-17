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
        Schema::create('bimbingan_kki', function (Blueprint $table) {
            $table->increments('id_bimbingankki');
            $table->string('id_mahasiswa');
            $table->date('tgl_bimbingan');
            $table->text('catatan');
            $table->string('verifikasi');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bimbbingan_kki');
    }
};
