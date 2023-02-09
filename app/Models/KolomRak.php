<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KolomRak extends Model
{
    use HasFactory;

    protected $table = 'kolom_rak';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nama_rak',
        'nama_kolom'
      ];

}
