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
        Schema::create('posisis', function (Blueprint $table) {
            $table->increments('posisi_id');
            $table->unsignedInteger('department_id');
            $table->foreign('department_id')->references('department_id')->on('departments');
            $table->string('nama_posisi', 30);
            $table->string('deskripsi', 250);
            $table->integer('gaji_pokok');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posisis');
    }
};
