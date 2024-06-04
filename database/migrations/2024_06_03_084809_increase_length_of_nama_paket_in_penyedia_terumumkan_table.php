<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('penyedia_terumumkan', function (Blueprint $table) {
            $table->text('nama_paket')->change();  // Mengubah kolom menjadi TEXT
            // Atau jika ingin tetap menggunakan VARCHAR dengan panjang yang lebih besar
            // $table->string('nama_paket', 512)->change(); // Sesuaikan 512 dengan panjang yang diinginkan
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('penyedia_terumumkan', function (Blueprint $table) {
            $table->string('nama_paket', 255)->change(); // Kembalikan ke tipe data semula jika perlu
        });
    }
};
