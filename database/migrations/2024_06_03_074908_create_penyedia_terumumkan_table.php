<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('penyedia_terumumkan', function (Blueprint $table) {
            $table->id();
            $table->integer('tahun_anggaran');
            $table->string('kd_klpd');
            $table->string('nama_klpd');
            $table->string('jenis_klpd');
            $table->integer('kd_satker');
            $table->string('kd_satker_str');
            $table->string('nama_satker');
            $table->string('kd_rup');
            $table->string('nama_paket');
            $table->bigInteger('pagu');
            $table->string('kd_metode_pengadaan');
            $table->string('metode_pengadaan');
            $table->string('kd_jenis_pengadaan');
            $table->string('jenis_pengadaan');
            $table->string('status_pradipa');
            $table->string('status_pdn');
            $table->string('status_ukm');
            $table->string('alasan_non_ukm')->nullable();
            $table->string('status_konsolidasi');
            $table->string('tipe_paket');
            $table->string('kd_rup_swakelola')->nullable();
            $table->string('kd_rup_lokal')->nullable();
            $table->string('volume_pekerjaan');
            $table->text('uraian_pekerjaan');
            $table->text('spesifikasi_pekerjaan');
            $table->date('tgl_awal_pemilihan');
            $table->date('tgl_akhir_pemilihan');
            $table->date('tgl_awal_kontrak')->nullable();
            $table->date('tgl_akhir_kontrak')->nullable();
            $table->date('tgl_awal_pemanfaatan')->nullable();
            $table->date('tgl_akhir_pemanfaatan')->nullable();
            $table->date('tgl_buat_paket')->nullable();
            $table->dateTime('tgl_pengumuman_paket')->nullable();
            $table->string('nip_ppk');
            $table->string('nama_ppk');
            $table->string('username_ppk')->nullable();
            $table->boolean('status_aktif_rup');
            $table->boolean('status_delete_rup');
            $table->string('status_umumkan_rup');
            $table->boolean('status_dikecualikan');
            $table->string('alasan_dikecualikan')->nullable();
            $table->integer('tahun_pertama')->nullable();
            $table->string('kd_rup_tahun_pertama')->nullable();
            $table->string('nomor_kontrak')->nullable();
            $table->boolean('spp_aspek_ekonomi');
            $table->boolean('spp_aspek_sosial');
            $table->boolean('spp_aspek_lingkungan');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('penyedia_terumumkan');
    }
};
