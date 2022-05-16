<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Unit>
 */
class UnitFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'unit_heading' => $this->faker->name(),
            'property_id' => rand(1, 3),
            'unit_type_id' => rand(0, 6),
            'unit_feature_id' => rand(1, 9),
            'number_of_bedroom' => rand(1, 5),
            'number_of_bathroom' => rand(1, 3),
            'number_of_balcony' => rand(0, 3),
            'date_available_from' => now(),
            'is_active' => true,
            'desription' => $this->faker->name(),
            'carpet_area' => false,
            'unit_number' => rand(0, 1000),
            'unit_floor_number' => rand(0, 10),
            'size' => rand(300, 1240),
            'price' => rand(700, 3240),
        ];
    }
}
