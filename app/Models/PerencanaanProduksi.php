<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PerencanaanProduksi extends Model
{
    use HasFactory;

    protected $table = 'perencanaan_produksi';
    protected $primaryKey = 'id';
    protected $fillable = [
        'proses_produksi_id',
        'kepala_penjahit',
        'detail_pemesanan_model_id',
        'tanggal_mulai',
        'tanggal_selesai',
        'gambar_pola',
      ];
}
