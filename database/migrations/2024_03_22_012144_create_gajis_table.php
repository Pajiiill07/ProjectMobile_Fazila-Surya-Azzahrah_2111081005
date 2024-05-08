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
        Schema::create('gajis', function (Blueprint $table) {
            $table->increments('gaji_id');
            $table->unsignedInteger('pegawai_id');
            $table->unsignedInteger('posisi_id');
            $table->foreign('pegawai_id')->references('pegawai_id')->on('pegawais');
            $table->foreign('posisi_id')->references('posisi_id')->on('posisis');
            $table->integer('gaji_pokok');
            $table->integer('tunjangan');
            $table->integer('pph');
            $table->integer('total_gaji');
            $table->string('periode_penggajian', 30);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gajis');
    }
};
