<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PembelianBahanBakuDetail extends Model
{
    use HasFactory;

    protected $table = 'detail_pembelian_bahanbaku';
    protected $primaryKey = 'id';
    protected $fillable = [
        'bahan_baku_id',
        'pembelian_bahanbaku_id',
        'jumlah',
        'harga_beli',
        'subtotal',
      ];
}
