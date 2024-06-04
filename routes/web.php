<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServiceISBController;
use App\Http\Controllers\SyncISBController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function () {
    Route::view('about', 'about')->name('about');

    Route::get('users', [\App\Http\Controllers\UserController::class, 'index'])->name('users.index');

    Route::get('profile', [\App\Http\Controllers\ProfileController::class, 'show'])->name('profile.show');
    Route::put('profile', [\App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');

    Route::resource('serviceisb', ServiceISBController::class);



    // Route untuk menampilkan halaman index dan data terakhir yang disinkronisasi
    Route::get('/sync-isb', [SyncISBController::class, 'index'])->name('syncisb.index');

    // Route untuk melakukan proses sinkronisasi data
    Route::post('/sync-penyedia-terumumkan', [SyncISBController::class, 'syncPenyediaTerumumkan'])->name('syncpenyediaterumumkan.sync');
    Route::post('/sync-isb/sync', [SyncISBController::class, 'syncSwakelolaTerumumkan'])->name('syncswakelolaterumumkan.sync');

    // Route untuk ekspor data
    Route::post('/penyedia/export', [SyncISBController::class, 'exportPenyedia'])->name('penyedia.export');
    Route::post('/swakelola/export', [SyncISBController::class, 'exportSwakelola'])->name('swakelola.export');
});
