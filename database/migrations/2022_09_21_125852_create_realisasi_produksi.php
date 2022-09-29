<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRealisasiProduksi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('realisasi_produksi', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('perencanaan_produksi_id');
            $table->bigInteger('proses_produksi_id');
            $table->date('tanggal_mulai');
            $table->date('tanggal_selesai');
            $table->string('foto');
            $table->text('keterangan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('realisasi_produksi');
    }
}
