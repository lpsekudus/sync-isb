<?php

namespace App\Exports;

use App\Models\PenyediaTerumumkan;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithChunkReading;

class PenyediaExport implements FromCollection
{
    /**
     * Method collection digunakan untuk mengambil data yang akan diekspor ke Excel.
     *
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return PenyediaTerumumkan::all();
    }
}
