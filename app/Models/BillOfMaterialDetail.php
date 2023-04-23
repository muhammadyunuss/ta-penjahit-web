<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BillOfMaterialDetail extends Model
{
    use HasFactory;

    protected $table = 'bom_model_detail';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'bom_id',
        'bahanbaku_id',
        'jumlah',
    ];
}
