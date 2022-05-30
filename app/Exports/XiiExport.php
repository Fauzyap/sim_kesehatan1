<?php

namespace App\Exports;

use App\Models\XII;
use Maatwebsite\Excel\Concerns\FromCollection;

class XiiExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return XII::all();
    }
}
