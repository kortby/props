<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Property>
 */
class PropertyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'total_floors' => rand(0, 8),
            'number_of_units' => rand(1, 800),
            'property_type_id' => rand(1, 5),
            'description' => $this->faker->paragraph(),
            'number_of_elevators' => rand(0, 4),
            'address_line_1' => rand(1, 12304) . $this->faker->name() . ' St',
            'address_line_2' => null,
            'city' => $this->faker->name(),
            'state' => 'TX',
            'country' => 'United State',
            'postal_code' => rand(70000, 79000),
            'phone' => rand(2141111111, 2149999999),
        ];
    }
}
