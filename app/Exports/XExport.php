<?php

namespace App\Exports;

use App\Models\dataSiswa;
use Maatwebsite\Excel\Concerns\FromCollection;

class Xexport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return dataSiswa::all();
    }
}
