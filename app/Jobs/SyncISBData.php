<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Http\Client\Response;
use Illuminate\Http\Request;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\PenyediaTerumumkan;
use Illuminate\Support\Facades\Http;

class SyncISBData implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        // Contoh: mengambil data dari service "Penyedia Terumumkan"
        $response = Http::get('url_json_service');
        foreach ($response->json() as $data) {
            PenyediaTerumumkan::updateOrCreate(
                ['kd_rup' => $data['kd_rup']], // Key untuk identifikasi unik
                $data // Data yang akan disimpan atau diperbarui
            );
        }
    }
}
