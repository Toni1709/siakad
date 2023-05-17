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
        Schema::create('pinjaman_buku', function (Blueprint $table) {
            $table->increments('id_pinjaman');
            $table->string('id_mahasiswa');
            $table->string('id_buku');
            $table->date('tgl_pinjam');
            $table->date('tgl_pengembalian');
            $table->string('status_pengembalian');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pinjaman_buku');
    }
};
