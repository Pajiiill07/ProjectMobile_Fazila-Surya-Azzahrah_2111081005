<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PosisiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Posisi::create([
            'nama_posisi' => 'IT Consultantt',
            'deskripsi' => 'mitra atau vendor yang memberikan saran, pedoman, dan site map untuk mencari, memanfaatkan, dan mengelola aset dan sumber daya teknologi informasi',
            'department_id' => '1',
        ]);
    }
}
