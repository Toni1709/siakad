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
        Schema::create('file_nilai_kki', function (Blueprint $table) {
            $table->increments('id_lnilai');
            $table->string('id_kelas');
            $table->string('id_mahasiswa');
            $table->string('file_nilai');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('file_nilai_kki');
    }
};
