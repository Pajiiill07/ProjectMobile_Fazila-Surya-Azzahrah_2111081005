<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class CutiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'pegawai_id' => fake()->numberBetween(1, 5),
            'tanggal_mulai' => fake()->date('Y-m-d'),
            'tanggal_selesai' => fake()->date('Y-m-d'),
            'jenis_cuti' => fake()->randomElement(['Cuti Tahunan','Cuti Melahirkan']),
            'keterangan' => $this->faker->paragraph(numberBetween(7,10)),
            'status_pengajuan' => fake()->randomElemet(['Ditinjau', 'Disetujui', 'Ditolak'])
        ];
    }
}
