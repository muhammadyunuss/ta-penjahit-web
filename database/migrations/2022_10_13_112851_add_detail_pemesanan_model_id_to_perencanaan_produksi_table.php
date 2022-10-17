<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDetailPemesananModelIdToPerencanaanProduksiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('perencanaan_produksi', function (Blueprint $table) {
            $table->bigInteger('detail_pemesanan_model_id')->after('proses_produksi_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('perencanaan_produksi', function (Blueprint $table) {
            //
        });
    }
}
