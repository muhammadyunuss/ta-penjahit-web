<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemesanan extends Model
{
    use HasFactory;

    protected $table = 'pemesanan';
    protected $primaryKey = 'id';
    protected $fillable = [
        'pelanggan_id',
        'penjahit_id',
        'proses_produksi_id',
        'pengambilan_id',
        'perencanaan_produksi_id',
        'tanggal',
        'total_ongkos',
        'bayar',
        'status_pembayaran'
      ];
}
