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
        Schema::create('pengajuan_pembayaran', function (Blueprint $table) {
            $table->increments('id_pengajuan');
            $table->string('id_mahasiswa');
            $table->string('status_pengajuan');
            $table->string('file');
            $table->date('tgl_pengajuan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pengajuan_pembayaran');
    }
};
