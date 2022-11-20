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
            'src' => 'https://via.placeholder.com/615x615?text=...',
            'thumbnail' => 'https://via.placeholder.com/615x615?text=...',
            'width' => 1920,
            'height' => 1280,
            'alt' => 'Domek',
        ];
    }
}
