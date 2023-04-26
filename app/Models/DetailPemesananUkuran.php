<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailPemesananUkuran extends Model
{
    use HasFactory;

    protected $table = 'detail_pemesanan_model_ukuran';
    protected $primaryKey = 'id';
    protected $fillable = [
    'id',
    'detail_pemesanan_model_id',
    'tinggi_badan',
    'berat_badan',
    'ukuran_baju',
    'panjang_atasan',
    'jumlah_baju_dengan_ukuran_yg_sama',
    'lingkar_dada',
    'lingkar_perut_atasan',
    'lingkar_pinggul_atasan',
    'lebar_bahu',
    'panjang_tangan',
    'lingkar_siku',
    'lingkar_pergelangan',
    'kerah',
    'ukuran_celana',
    'panjang_celana',
    'lingkar_perut_celana',
    'pesak',
    'lingkar_pinggul_celana',
    'lingkar_paha',
    'lingkar_lutut',
    'lingkar_bawah',
    'bom_id',
    'deskripsi_ukuran'
    ];
}
