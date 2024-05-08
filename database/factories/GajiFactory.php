<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class GajiFactory extends Factory
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
            'gaji_pokok' => fake()->randomFloat(2, 1, 100),
            'tunjangan' => fake()->randomFloat(2, 1, 100),
            'bonus' => fake()->number_format(5,2),
            'potongan_gaji' =>fake()->number_format(5,2),
            'pajak' => fake()->number_format(5,2),
            'total_gaji' => fake()->randomFloat(2, 1, 100),
            'periode_penggajian' => fake()->randomElement(['Gaji Bulanan','Gaji Tahunan']),
            'posisi_id' => fake()->numberBetween(1, 5)
        ];
    }
}
