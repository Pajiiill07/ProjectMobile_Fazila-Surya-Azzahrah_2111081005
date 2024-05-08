<?php

namespace Database\Factories;
use App\Models\Pegawai;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class PegawaiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $managerId = Pegawai::query()->inRandomOrder()->first()->pegawai_id;

        return [
            'user_id' => fake()->numberBetween(1, 5),
            'nama_lengkap' => fake()->name(),
            'no_hp' => fake()->phoneNumber(),
            'email' => fake()->unique()->safeEmail(),
            'alamat' => fake()->address(),
            'tanggal_lahir' => fake()->date('Y-m-d'),
            'jenis_kelamin' => fake()->randomElement(['Laki-Laki','Perempuan']),
            'pendidikan_terakhir' => fake()->randomElement(['SLTA', 'D3','D4/S1','S2', 'S3']),
            'file_upload' => $this->faker->randomElement(['ini.jpg', 'indoor.png', 'jsdjks.jpg', 'hs.png', 'jsbs.png']),
            'posisi_id' => fake()->numberBetween(1, 5),
            'manager_id' => $managerId,
            'tanggal_mulai' => fake()->date('Y-m-d'),
        ];
    }
}
