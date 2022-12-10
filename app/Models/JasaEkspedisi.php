<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JasaEkspedisi extends Model
{
    use HasFactory;
    protected $table = 'jasa_ekspedisi';
    protected $primaryKey = 'id';
    protected $fillable = [
        'jasa_ekspedisi',
      ];
}
