<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\FurnishingCategory>
 */
class FurnishingCategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $category = ['Bedroom', 'Kitchen', 'Bathroom', 'Living Room'];
        return [
            'name' => $category[rand(0, 3)],
        ];
    }
}
