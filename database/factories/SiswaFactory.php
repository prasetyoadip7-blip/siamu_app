<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class SiswaFactory extends Factory
{
    public function definition(): array
    {
        return [
            'nis' => $this->faker->unique()->numberBetween(10000,99999),
            'nama' => $this->faker->name(),
        ];
    }
}