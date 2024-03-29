<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BillOfMaterial extends Model
{
    use HasFactory;

    protected $table = 'bom_model';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'model_id',
        'bom_standart_ukuran_id',
    ];
}
