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
            $table->bigInteger('model_id')->nullable();
            $table->bigInteger('pemesanan_id')->nullable();
            $table->bigInteger('jenis_model_id')->nullable();
            $table->double('banyaknya')->nullable();
            $table->double('ongkos_jahit')->nullable();
            $table->double('tinggi_badan')->nullable();
            $table->double('berat_badan')->nullable();
            $table->string('ukuran_baju')->nullable();
            $table->double('panjang_jas')->nullable();
            $table->double('lingkar_dada')->nullable();
            $table->double('lingkar_pinggang')->nullable();
            $table->double('lingkar_pinggul')->nullable();
            $table->double('lebar_bahu')->nullable();
            $table->double('lebar_punggung')->nullable();
            $table->double('panjang_lengan')->nullable();
            $table->double('lingkar_siku')->nullable();
            $table->double('lingkar_ujung_lengan')->nullable();
            $table->double('lingkar_kerong_lengan')->nullable();
            $table->double('ukuran_celana')->nullable();
            $table->double('panjang_celana')->nullable();
            $table->double('lingkar_parut')->nullable();
            $table->double('pesak')->nullable();
            $table->double('lingkar_paha')->nullable();
            $table->double('lingkar_lutut')->nullable();
            $table->double('lingkar_kaki')->nullable();
            $table->double('panjang_kebaya')->nullable();
            $table->double('panjang_dress')->nullable();
            $table->double('panjang_muka')->nullable();
            $table->double('panjang_belakang')->nullable();
            $table->double('bawah_tangan')->nullable();
            $table->double('lingkar_leher')->nullable();
            $table->double('cup_dada')->nullable();
            $table->double('turun_dada')->nullable();
            $table->double('panjang_rok')->nullable();
            $table->double('panjang_bawah')->nullable();
            $table->text('deskripsi_pemesanan')->nullable();
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
