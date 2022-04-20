<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $services = ['Cleaning', 'Gas & Electric', 'Cooling & Heating', 'Water & Pluming', 'Security'];
        return [
            'name' => $services[rand(0, 4)],
        ];
    }
}
