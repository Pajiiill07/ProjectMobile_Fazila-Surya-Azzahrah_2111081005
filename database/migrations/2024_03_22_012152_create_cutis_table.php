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
        Schema::create('cutis', function (Blueprint $table) {
            $table->increments('cuti_id');
            $table->unsignedInteger('pegawai_id');
            $table->foreign('pegawai_id')->references('pegawai_id')->on('pegawais');
            $table->integer('jatah_cuti');
            $table->date('tanggal_mulai');
            $table->date('tanggal_selesai');
            $table->string('alasan', 100);
            $table->string('status_pengajuan', 30);
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cutis');
    }
};
