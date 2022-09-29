<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePemesanan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pemesanan', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('pelanggan_id');
            $table->bigInteger('penjahit_id');
            $table->bigInteger('proses_produksi_id');
            $table->bigInteger('pengambilan_id');
            $table->bigInteger('perencanaan_produksi_id');
            $table->date('tanggal');
            $table->double('total_ongkos');
            $table->double('bayar');
            $table->string('status_pembayaran');
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
        Schema::dropIfExists('pemesanan');
    }
}
