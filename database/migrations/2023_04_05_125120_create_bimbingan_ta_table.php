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
        Schema::create('bimbingan_ta', function (Blueprint $table) {
            $table->increments('id_bimbingan_ta');
            $table->string('id_mahasiswa');
            $table->string('tgl_bimbingan');
            $table->string('bab');
            $table->text('catatan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bimbingan_ta');
    }
};
