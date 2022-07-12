<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\People>
 */
class PersonFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'full_name' => fake()->firstNameMale() . ' ' . fake()->lastName(),
            'birthday' => fake()->date('d.m.Y', now()->subYears(18)) // Минимум 18 лет
        ];
    }
}
