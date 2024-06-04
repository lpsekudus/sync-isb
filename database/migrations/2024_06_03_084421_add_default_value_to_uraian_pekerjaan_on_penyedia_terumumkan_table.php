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
            $table->text('uraian_pekerjaan')->default('')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('penyedia_terumumkan', function (Blueprint $table) {
            $table->text('uraian_pekerjaan')->default(null)->change();
        });
    }
};
