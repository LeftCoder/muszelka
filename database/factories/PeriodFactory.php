<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Period>
 */
class PeriodFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $start = fake()->dateTimeBetween('-1 year', 'now');
        $end = fake()->dateTimeBetween($start, $start->format('Y-m-d H:i:s').' +1 month');

        return [
            'start' => $start,
            'end' => $end,
            'small' => fake()->numberBetween(100, 300),
            'big' => fake()->numberBetween(100, 300),
        ];
    }
}
