<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PembelianBahanBaku extends Model
{
    use HasFactory;

    protected $table = 'pembelian_bahanbaku';
    protected $primaryKey = 'id';
    protected $fillable = [
        'supplier_id',
        'penjahit_id',
        'tanggal_beli',
        'bayar',
        'total',
      ];
}
