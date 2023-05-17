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
        Schema::create('biaya_nonpendidikan', function (Blueprint $table) {
            $table->increments('id_biayanon');
            $table->string('id_mahasiswa');
            $table->string('jml_bayar');
            $table->string('jenis');
            $table->string('keterangan');
            $table->string('kasir');
            $table->string('no_bukti')->nullable();
            $table->date('tgl_pembayaran');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('biaya_nonpendidikan');
    }
};
