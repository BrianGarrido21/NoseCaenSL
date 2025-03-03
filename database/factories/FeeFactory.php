<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Fee>
 */
class FeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'concept' => $this->faker->word(),
            'import' => $this->faker->randomFloat(2, 1, 1000),
            'due_date' => $this->faker->dateTimeBetween('now', '+1 year'),
            'is_paid' => $this->faker->boolean(),
            'user_id' => $this->faker->numberBetween(1, 10),
            'notes' => $this->faker->sentence(),
            'currency_iso' => 'usd',
        ];
    }
}
