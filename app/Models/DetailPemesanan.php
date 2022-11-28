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
        'deskripsi_pemesanan'
    ];
}
