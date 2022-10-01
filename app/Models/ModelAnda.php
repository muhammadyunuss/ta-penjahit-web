<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelAnda extends Model
{
    use HasFactory;
    protected $table = 'model';
    protected $primaryKey = 'id';
    protected $fillable = [
        'jenis_model',
        'pelanggan_id',
        'foto_model',
        'nama_model',
        'ongkos_jahit',
        'deskripsi_model',
      ];

    public static function getJenisModel()
    {
        $data = [
            '1' => 'Pria',
            '2' => 'Wanita'
        ];

        return $data;
    }
}
