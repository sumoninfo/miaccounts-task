<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Transaction>
 */
class TransactionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'date'   => $this->faker->dateTimeBetween('-6 months', 'now'),
            'debit'  => $this->faker->randomFloat(0, 10, 10000),
            'credit' => $this->faker->randomFloat(0, 10, 1000),
        ];
    }
}
