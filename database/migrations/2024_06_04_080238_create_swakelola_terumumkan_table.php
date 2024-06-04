<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSwakelolaTerumumkanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('swakelola_terumumkan', function (Blueprint $table) {
            $table->id();
            $table->integer('tahun_anggaran');
            $table->string('kd_klpd', 10);
            $table->string('nama_klpd');
            $table->string('jenis_klpd');
            $table->integer('kd_satker');
            $table->string('kd_satker_str');
            $table->string('nama_satker');
            $table->string('kd_rup');
            $table->string('nama_paket');
            $table->bigInteger('pagu');
            $table->string('tipe_swakelola', 5);
            $table->string('volume_pekerjaan');
            $table->text('uraian_pekerjaan');
            $table->string('kd_klpd_penyelenggara')->nullable();
            $table->string('nama_klpd_penyelenggara')->nullable();
            $table->string('nama_satker_penyelenggara')->nullable();
            $table->date('tgl_awal_pelaksanaan_kontrak');
            $table->date('tgl_akhir_pelaksanaan_kontrak');
            $table->date('tgl_buat_paket');
            $table->timestamp('tgl_pengumuman_paket');
            $table->string('nip_ppk');
            $table->string('nama_ppk');
            $table->string('username_ppk')->nullable();
            $table->string('kd_rup_lokal')->nullable();
            $table->boolean('status_aktif_rup');
            $table->boolean('status_delete_rup');
            $table->string('status_umumkan_rup');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('swakelola_terumumkan');
    }
}
