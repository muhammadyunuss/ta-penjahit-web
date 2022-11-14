<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RealisasiProgres extends Model
{
    use HasFactory;

    protected $table = 'realisasi_produksi';
    protected $primaryKey = 'id';
    protected $fillable = [
        'perencaan_produksi_id',
        'proses_produksi_id',
        'tanggal_mulai',
        'tanggal_selesai',
        'foto',
        'keterangan'
    ];
}
