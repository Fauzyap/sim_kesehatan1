<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InputS extends Model
{
    use HasFactory;
   protected $primaryKey="nis";
    protected $fillable=['nis','nama', 'jk', 'rombel', 'rayon', 'tanggal', 'pukul', 'suhutubuh', 'tensi', 'diagnosa', 'keterangan'];
    protected $table='inputsakit';

}