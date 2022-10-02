<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailPemesanan extends Model
{
    use HasFactory;

    protected $table = 'detail_pemesanan_model';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'pemesanan_id',
        'model_id',
        'jenis_model_id',
        'banyaknya',
        'ongkos_jahit',
        'tinggi_badan',
        'berat_badan',
        'ukuran_baju',
        'panjang_jas',
        'lingkar_dada',
        'lingkar_pinggang',
        'lingkar_pinggul',
        'lebar_bahu',
        'lebar_punggung',
        'panjang_lengan',
        'lingkar_siku',
        'lingkar_ujung_lengan',
        'lingkar_kerong_lengan',
        'ukuran_celana',
        'panjang_celana',
        'lingkar_parut',
        'pesak',
        'lingkar_paha',
        'lingkar_lutut',
        'lingkar_kaki',
        'panjang_kebaya',
        'panjang_dress',
        'panjang_muka',
        'panjang_belakang',
        'bawah_tangan',
        'lingkar_leher',
        'cup_dada',
        'turun_dada',
        'panjang_rok',
        'panjang_bawah'
    ];
}
