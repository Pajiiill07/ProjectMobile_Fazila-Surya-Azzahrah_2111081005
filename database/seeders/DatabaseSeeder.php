<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory(10)->create();
        \App\Models\Pegawai::factory(10)->create();
        \App\Models\Department::factory(10)->create();
        \App\Models\Posisi::factory(10)->create();
        \App\Models\Gaji::factory(10)->create();
        \App\Models\Cuti::factory(10)->create();
        \App\Models\Absen::factory(10)->create();
        \App\Models\Laporan::factory(10)->create();
        \App\Models\Evaluasi::factory(10)->create();
    }
}
