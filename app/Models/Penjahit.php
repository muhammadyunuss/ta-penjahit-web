<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penjahit extends Model
{
    use HasFactory;

    protected $table = 'penjahit';
    protected $primaryKey = 'id';
    protected $fillable = [
        'email',
        'no_telepon',
        'nama_penjahit',
      ];
}
