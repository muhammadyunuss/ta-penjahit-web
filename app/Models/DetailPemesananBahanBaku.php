<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailPemesananBahanBaku extends Model
{
    use HasFactory;
    protected $table = 'detail_pemesanan_bahanbaku';
    protected $primaryKey = 'id';
    protected $fillable = [
        'pemesanan_id',
        'bahan_baku_id',
        'ongkos_jahit',
        'jumlah_terpakai',
        'detail_pemesanan_model_id'
    ];
}
