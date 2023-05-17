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
        Schema::create('file_training_softskill', function (Blueprint $table) {
            $table->increments('id_ts');
            $table->string('id_kelas');
            $table->string('id_mahasiswa');
            $table->string('tss');
            $table->string('verifikasi');
            $table->string('file_ts');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('file_training_softskill');
    }
};
