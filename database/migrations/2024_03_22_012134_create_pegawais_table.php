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
        Schema::create('pegawais', function (Blueprint $table) {
            $table->increments('pegawai_id');
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('posisi_id');
            $table->unsignedInteger('manager_id')->nullable();
            $table->foreign('user_id')->references('user_id')->on('users');
            $table->foreign('posisi_id')->references('posisi_id')->on('posisis');
            $table->foreign('manager_id')->references('pegawai_id')->on('pegawais')->nullable();
            $table->string('nama_lengkap', 50);
            $table->char('no_hp', 15);
            $table->string('email', 35);
            $table->string('alamat', 100);
            $table->date('tanggal_lahir');
            $table->char('jenis_kelamin', 1);
            $table->string('pendidikan_terakhir', 10);
            $table->string('foto_profile', 700);
            $table->date('tanggal_mulai');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pegawais');
    }
};
