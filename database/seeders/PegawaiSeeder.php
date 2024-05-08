<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PegawaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Pegawai::create([
            'user_id' => '1',
            'nama_lengkap' => 'Siti Nur Lela',
            'no_hp' => '08976342639',
            'email' => 'sitinur@gmail.com',
            'alamat' => 'jl pahlawan',
            'tanggal_lahir' => '1976-09-01',
            'jenis_kelamin' => 'P',
            'pendidikan_terakhir' => 'S3',
            'file_upload' => 'profile.jpg',
            'posisi_id' => '1',
            'manager_id' => null,
            'tanggal_mulai' => '2010-05-01',
        ]);

        \App\Models\Pegawai::create([
            'user_id' => '2',
            'nama_lengkap' => 'Bambang Supriyanto',
            'no_hp' => '0823456789876',
            'email' => 'bambangsup@gmail.com',
            'alamat' => 'jl pahlawan',
            'tanggal_lahir' => '1981-03-18',
            'jenis_kelamin' => 'L',
            'pendidikan_terakhir' => 'D4/S1',
            'file_upload' => 'profile.jpg',
            'posisi_id' => '1',
            'manager_id' => '1',
            'tanggal_mulai' => '2015-07-28',
        ]);

        \App\Models\Pegawai::create([
            'user_id' => '3',
            'nama_lengkap' => 'Alex Saputra',
            'no_hp' => '0823456789876',
            'email' => 'alexsptr@gmail.com',
            'alamat' => 'jl pahlawan',
            'tanggal_lahir' => '1988-09-12',
            'jenis_kelamin' => 'L',
            'pendidikan_terakhir' => 'D4/S1',
            'file_upload' => 'profile.jpg',
            'posisi_id' => '1',
            'manager_id' => '2',
            'tanggal_mulai' => '2018-05-21',
        ]);
    }
}
