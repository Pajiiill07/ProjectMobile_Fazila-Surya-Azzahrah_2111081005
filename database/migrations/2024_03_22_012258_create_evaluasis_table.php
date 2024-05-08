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
        Schema::create('evaluasis', function (Blueprint $table) {
            $table->increments('evaluasi_id');
            $table->unsignedInteger('pegawai_id');
            $table->foreign('pegawai_id')->references('pegawai_id')->on('pegawais');
            $table->date('tanggal_evaluasi');
            $table->float('penilaian_absensi', 4, 1);
            $table->float('penilaian_pelaporan', 4, 1);
            $table->string('catatan_dan_komentar', 200);
            $table->timestamps();


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('evaluasis');
    }
};
