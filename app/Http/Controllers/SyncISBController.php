<?php

namespace App\Http\Controllers;

use App\Models\PenyediaTerumumkan;
use App\Models\SwakelolaTerumumkan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\ServiceISB;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\PenyediaExport;
use App\Exports\SwakelolaExport;
use App\Jobs\ExportPenyediaData;

class SyncISBController extends Controller
{
    public function index()
    {
        $jumlahRow = PenyediaTerumumkan::count();
        $lastSync = PenyediaTerumumkan::latest()->first();
        $jumlahRowSwakelola = SwakelolaTerumumkan::count();
        $lastSyncSwakelola = SwakelolaTerumumkan::latest()->first();


        $service = ServiceISB::where('nama_service', 'RUP-PaketPenyedia-Terumumkan')->first();
        $namaService = $service ? $service->nama_service : 'Service tidak ditemukan';
        $serviceSwakelola = ServiceISB::where('nama_service', 'RUP-PaketSwakelola-Terumumkan')->first();
        $namaServiceSwakelola = $serviceSwakelola ? $serviceSwakelola->nama_service : 'Service tidak ditemukan';


        return view('syncisb.index', compact('jumlahRow', 'lastSync', 'namaService', 'jumlahRowSwakelola', 'lastSyncSwakelola', 'namaServiceSwakelola'));
    }

    public function syncPenyediaTerumumkan()
    {

        $service = ServiceISB::where('nama_service', 'RUP-PaketPenyedia-Terumumkan')->first();
        if (!$service) {
            return redirect()->route('syncisb.index')->with('error', 'Service tidak ditemukan');
        }
        $url = $service->url_json;


        $response = Http::get($url);
        if (!$response->successful()) {
            return redirect()->route('syncisb.index')->with('error', 'Gagal mengambil data dari service');
        }

        $data = $response->json();

        PenyediaTerumumkan::truncate();

        DB::beginTransaction();
        try {
            foreach ($data as $item) {
                PenyediaTerumumkan::create($item);
            }
            DB::commit();
            return redirect()->route('syncisb.index')->with('success', 'Data berhasil disinkronisasi');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->route('syncisb.index')->with('error', 'Error saat menyimpan data: ' . $e->getMessage());
        }
    }

    public function syncSwakelolaTerumumkan()
    {
        $service = ServiceISB::where('nama_service', 'RUP-PaketSwakelola-Terumumkan')->first();
        if (!$service) {
            return redirect()->route('syncisb.index')->with('error', 'Service tidak ditemukan');
        }
        $url = $service->url_json;

        $response = Http::get($url);
        if (!$response->successful()) {
            return redirect()->route('syncisb.index')->with('error', 'Gagal mengambil data dari service');
        }

        $data = $response->json();

        SwakelolaTerumumkan::truncate();

        DB::beginTransaction();
        try {
            foreach ($data as $item) {
                SwakelolaTerumumkan::create($item);
            }
            DB::commit();
            return redirect()->route('syncisb.index')->with('success', 'Data berhasil disinkronisasi');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->route('syncisb.index')->with('error', 'Error saat menyimpan data: ' . $e->getMessage());
        }
    }

    public function exportPenyedia()
    {
        return Excel::download(new PenyediaExport, 'penyedia.xlsx');
    }

    public function exportSwakelola()
    {
        return Excel::download(new SwakelolaExport, 'swakelola-terumumkan.xlsx');
    }
}
