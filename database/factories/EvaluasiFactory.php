<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class EvaluasiFactory extends Factory
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
            'tanggal_evaluasi' => fake()->date('Y-m-d'),
            'penilaian_absensi' => fake()->number_format(),
            'penilaian_pelaporan' => fake()->number_format(),
            'catatan_dan_komentar' => $this->faker->text(100)
        ];
    }
}
