<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\User::create([
            'username' => 'ajiihh',
            'email' => 'jiihhhhhhh@gmail.com',
            'email_verified_at' => now(),
            'password' => '$2a$12$IW9Znd8lzANoTXMPFRAl5e9.XNJWHv4g/oE202PHoJolseTHXnvLG',
            'hak_akses' => 'Admin',
        ]);

        \App\Models\User::create([
            'username' => 'pajiilll',
            'email' => 'pajiilllala@gmail.com',
            'email_verified_at' => now(),
            'password' => '$2a$12$.cNkpFIkTJlSsQWY3x7kzuBoQ8RIGn/TTk3dm6YWJzyraYiKVGwDC',
            'hak_akses' => 'Manager',
            'remember_token' => 'LmYV1JkIHI',
        ]);

        \App\Models\User::create([
            'username' => 'alexxx',
            'email' => 'alexsptr@gmail.com',
            'email_verified_at' => now(),
            'password' => '$2a$12$xolaJcppmjfhA6A9GJ9iWuZRLbNmjUENlndfFY5Cpvv8jdugGv0qu',
            'hak_akses' => 'Keuangan',
            'remember_token' => 'LmYV1JkIHI',
        ]);
    }
}
