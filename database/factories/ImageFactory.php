<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'src' => '/storage/houses/m-1.jpg',
            'thumbnail' => '/storage/houses/m-1.jpg',
            'width' => 1920,
            'height' => 1277,
            'alt' => 'Domek',
        ];
    }
}
