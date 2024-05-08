<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class LaporanFactory extends Factory
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
            'tanggal_laporan' => fake()->date('Y-m-d'),
            'tanggal_submit' => fake()->date('Y-m-d'),
            'judul_laporan' => fake()->sentence(numberBetween(2,4)),
            'isi_laporan' => $this->faker->text(200)
        ];
    }
}
