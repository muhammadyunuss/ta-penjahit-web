<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengambilan extends Model
{
    use HasFactory;
    protected $table = 'pengambilan';
    protected $primaryKey = 'id';
    protected $fillable = [
        'pemesanan_id',
        'jasa_ekspedisi_id',
        'opsi_pengambilan',
        'tanggal',
        'alamat_pengiriman',
        'biaya_pengiriman',
        'no_resi'
      ];
}
