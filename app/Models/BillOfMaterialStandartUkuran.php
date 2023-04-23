<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BillOfMaterialStandartUkuran extends Model
{
    use HasFactory;

    protected $table = 'bom_standart_ukuran';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'ukuran',
        'lebar_kain',
    ];
}
