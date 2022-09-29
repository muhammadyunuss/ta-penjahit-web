<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailPemesananModel extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_pemesanan_model', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('model_id');
            $table->bigInteger('pemesanan_id');
            $table->bigInteger('jenis_model_id');
            $table->double('banyaknya');
            $table->double('ongkos_jahit');
            $table->double('tinggi_badan');
            $table->double('berat_badan');
            $table->string('ukuran_baju');
            $table->double('panjang_jas');
            $table->double('lingkar_dada');
            $table->double('lingkar_pinggang');
            $table->double('lingkar_pinggul');
            $table->double('lebar_bahu');
            $table->double('lebar_punggung');
            $table->double('panjang_lengan');
            $table->double('lingkar_siku');
            $table->double('lingkar_ujung_lengan');
            $table->double('lingkar_kerong_lengan');
            $table->double('ukuran_celana');
            $table->double('panjang_celana');
            $table->double('lingkar_parut');
            $table->double('pesak');
            $table->double('lingkar_paha');
            $table->double('lingkar_lutut');
            $table->double('lingkar_kaki');
            $table->double('panjang_kebaya');
            $table->double('panjang_dress');
            $table->double('panjang_muka');
            $table->double('panjang_belakang');
            $table->double('bawah_tangan');
            $table->double('lingkar_leher');
            $table->double('cup_dada');
            $table->double('turun_dada');
            $table->double('panjang_rok');
            $table->double('panjang_bawah');
            $table->text('deskripsi_pemesanana');
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
        Schema::dropIfExists('detail_pemesanan_model');
    }
}
