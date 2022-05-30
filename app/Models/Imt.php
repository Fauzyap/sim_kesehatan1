<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Imt extends Model
{
    protected $table = 'imt';

    protected $fillable = [
        'nis',
        'nama',
        'rombel',
        'rayon',
        'hasil_imt',
    ];
}
