<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class X extends Model
{
    use HasFactory;
    protected $primaryKey="nis";
    protected $fillable=['nama', 'JK', 'rombel', 'rayon'];
    protected $table='_x';
}