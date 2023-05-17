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
        Schema::create('tugas', function (Blueprint $table) {
            $table->increments('id_tugas');
            $table->string('id_jadwal');
            $table->string('id_mapel');
            $table->string('id_kelas');
            $table->string('id_karyawan');
            $table->string('file')->nullable();
            $table->text('keterangan')->nullable();
            $table->dateTime('mulai');
            $table->dateTime('selesai');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tugas');
    }
};
