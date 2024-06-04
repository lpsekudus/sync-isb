<?php

namespace App\Jobs;

use App\Exports\PenyediaExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ExportPenyediaData implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function handle()
    {
        $filePath = 'penyedia-terumumkan.xlsx';
        Excel::store(new PenyediaExport, $filePath);
        // Anda bisa menyimpan path file di database atau mengirimkannya via email
    }
}
