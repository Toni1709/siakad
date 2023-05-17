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
        Schema::create('pengajuan_ta', function (Blueprint $table) {
            $table->increments('id_ta');
            $table->string('id_mahasiswa');
            $table->string('pembimbing1');
            $table->string('pembimbing2')->nullable();
            $table->string('judul');
            $table->string('file');
            $table->string('catatan')->nullable();
            $table->string('status');
            $table->date('tanggal');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pengajuan_ta');
    }
};
