<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Department::create([
            'nama_department' => 'Divisi IT',
            'deskripsi' => 'job desk IT berkecimpung di tugas-tugas teknis seperti meningkatkan kinerja dari komputer, software, dan sistem jaringan di perusahaan',
            
        ]);
    }
}
