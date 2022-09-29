<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePerencanaanProduksi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('perencanaan_produksi', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('proses_produksi_id');
            $table->date('tanggal_mulai');
            $table->date('tanggal_selesai');
            $table->string('gambar_pola');
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
        Schema::dropIfExists('perencanaan_produksi');
    }
}
