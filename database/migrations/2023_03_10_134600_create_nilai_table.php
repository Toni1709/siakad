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
        Schema::create('nilai', function (Blueprint $table) {
            $table->increments('id_nilai');
            $table->string('id_mahasiswa');
            $table->string('semester');
            $table->string('id_mapel');
            $table->string('id_kelas');
            $table->string('absensi');
            $table->string('formatif');
            $table->string('tugas');
            $table->string('uts');
            $table->string('uas');
            $table->string('rata_rata');
            $table->string('grade');
            $table->string('angka_mutu');
            $table->string('mutu');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nilai');
    }
};
