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
        Schema::create('absens', function (Blueprint $table) {
            $table->increments('absen_id');
            $table->unsignedInteger('pegawai_id');
            $table->foreign('pegawai_id')->references('pegawai_id')->on('pegawais');
            $table->date('tanggal');
            $table->time('jam_datang')->nullable();
            $table->time('jam_pulang')->nullable();
            $table->string('keterangan', 50);
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('absens');
    }
};
