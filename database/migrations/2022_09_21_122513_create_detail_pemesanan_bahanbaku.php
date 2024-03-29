<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailPemesananBahanbaku extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_pemesanan_bahanbaku', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('bahan_baku_id')->nullable();
            $table->double('ongkos_jahit')->nullable();
            $table->double('jumlah_terpakai')->nullable();
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
        Schema::dropIfExists('detail_pemesanan_bahanbaku');
    }
}
