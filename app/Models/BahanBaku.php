<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BahanBaku extends Model
{
    use HasFactory;

    protected $table = 'bahan_baku';
    protected $primaryKey = 'id';
    protected $fillable = [
        'kode_bahan_baku',
        'nama_bahanbaku',
        'letak_bahanbaku',
        'harga_beli',
        'harga_jual',
        'stok',
        'satuan',
        'supplier_id',
      ];

}
