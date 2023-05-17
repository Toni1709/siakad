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
        Schema::create('file_laporan_kki', function (Blueprint $table) {
            $table->increments('id_laporan');
            $table->string('id_kelas');
            $table->string('id_mahasiswa');
            $table->string('file_laporan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('file_laporan_kki');
    }
};
