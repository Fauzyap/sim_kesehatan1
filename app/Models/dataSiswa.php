<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dataSiswa extends Model
{
    use HasFactory;
    protected $primaryKey="nis";
    protected $fillable=['nama', 'JK', 'rombel', 'rayon'];
    protected $table='tb_datasiswa';
}
