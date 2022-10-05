<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModel extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('model', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('jenis_model')->nullable();
            $table->bigInteger('pelanggan_id')->nullable();
            $table->string('foto_model')->nullable();
            $table->string('nama_model')->nullable();
            $table->string('ongkos_jahit')->nullable();
            $table->string('deskripsi_model')->nullable();
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
        Schema::dropIfExists('model');
    }
}
