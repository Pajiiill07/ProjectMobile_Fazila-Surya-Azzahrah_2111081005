<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class PosisiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama_posisi' => $this->faker->jobTitle(),
            'deskripsi' => $this->faker->text(100),
            'department_id' => fake()->numberBetween(1, 5)
        ];
    }
}
