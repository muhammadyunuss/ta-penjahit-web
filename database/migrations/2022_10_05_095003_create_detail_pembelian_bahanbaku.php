<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailPembelianBahanbaku extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_pembelian_bahanbaku', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('bahan_baku_id')->nullable();
            $table->bigInteger('pembelian_bahanbaku_id')->nullable();
            $table->double('jumlah')->nullable();
            $table->double('harga_beli')->nullable();
            $table->double('subtotal')->nullable();
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
        Schema::dropIfExists('detail_pembelian_bahanbaku');
    }
}
