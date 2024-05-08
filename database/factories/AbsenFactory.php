<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class AbsenFactory extends Factory
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
            'tanggal' => fake()->date('Y-m-d'),
            'jam_datang' => fake()->time('H:i'),
            'jam_pulang' => fake()->time('H:i'),
            'total_jamkerja' => fake()->time('H:i'),
            'keterangan' => $this->faker->text(100),
        ];
    }
}
