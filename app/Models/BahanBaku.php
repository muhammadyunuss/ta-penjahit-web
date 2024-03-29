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
        'kolom_rak_id',
        'harga_beli',
        'harga_jual',
        'stok',
        'satuan',
        'foto_bahanbaku',
        'lebar',
        'warna_kain',
        'supplier_id',
      ];

}
