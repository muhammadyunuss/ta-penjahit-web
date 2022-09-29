<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengambilan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengambilan', function (Blueprint $table) {
            $table->id();
            $table->string('opsi_pengambilan');
            $table->date('tanggal');
            $table->string('alamat_pengiriman');
            $table->double('biaya_pengiriman');
            $table->string('no_resi');
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
        Schema::dropIfExists('pengambilan');
    }
}
