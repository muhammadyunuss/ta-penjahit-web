<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDetailPemesananModelIdToDetailPemesananBahanbaku extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('detail_pemesanan_bahanbaku', function (Blueprint $table) {
            $table->bigInteger('detail_pemesanan_model_id')->after('bahan_baku_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('detail_pemesanan_bahanbaku', function (Blueprint $table) {
            //
        });
    }
}
