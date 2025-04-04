<?php

namespace Database\Factories;

use App\Models\Gender;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama_mahasiswa' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'NIM' => $this->faker->unique()->numerify('##########'),
            'nomor_telepon' => $this->faker->phoneNumber(),
            'gender_id' => Gender::inRandomOrder()->first()->id ?? Gender::factory(),
        ];
    }
}
