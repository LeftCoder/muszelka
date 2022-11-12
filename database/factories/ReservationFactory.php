<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Reservation>
 */
class ReservationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $days = fake()->numberBetween(2, 7);
        $start = fake()->dateTimeBetween('-1 year', 'now');
        $end = fake()->dateTimeBetween($start, $start->format('Y-m-d H:i:s')." +{$days} days");

        return [
            'name' => fake()->firstName(),
            'surname' => fake()->lastName(),
            'email' => fake()->email(),
            'phone' => fake()->e164PhoneNumber(),
            'start' => $start,
            'end' => $end,
            'adults' => fake()->randomDigitNotZero(),
            'children' => fake()->randomDigitNotZero(),
            'animals' => fake()->boolean(),
            'confirmed' => fake()->boolean(),
        ];
    }
}
