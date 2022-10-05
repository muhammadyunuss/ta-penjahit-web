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
            $table->bigInteger('pelanggan_id')->nullable();
            $table->bigInteger('penjahit_id')->nullable();
            $table->bigInteger('proses_produksi_id')->nullable();
            $table->bigInteger('pengambilan_id')->nullable();
            $table->bigInteger('perencanaan_produksi_id')->nullable();
            $table->date('tanggal')->nullable();
            $table->double('total_ongkos')->nullable();
            $table->double('bayar')->nullable();
            $table->string('status_pembayaran')->nullable();
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
