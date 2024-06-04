<?php

namespace App\Exports;

use App\Models\SwakelolaTerumumkan;
use Maatwebsite\Excel\Concerns\FromCollection;

class SwakelolaExport implements FromCollection
{
    /**
     * Method collection digunakan untuk mengambil data yang akan diekspor ke Excel.
     *
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return SwakelolaTerumumkan::all();
    }
}
