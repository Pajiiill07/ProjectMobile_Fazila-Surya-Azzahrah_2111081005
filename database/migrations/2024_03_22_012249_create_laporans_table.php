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
        Schema::create('laporans', function (Blueprint $table) {
            $table->increments('laporan_id');
            $table->unsignedInteger('pegawai_id');
            $table->foreign('pegawai_id')->references('pegawai_id')->on('pegawais');
            $table->date('tanggal_laporan');
            $table->date('tanggal_submit');
            $table->string('judul_laporan', 100);
            $table->string('isi_laporan', 1200);
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laporans');
    }
};
