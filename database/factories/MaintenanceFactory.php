<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Maintenance>
 */
class MaintenanceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $status = ['new', 'in-progress', 'resolved', 'closed', 'cancelled'];
        $proirity = ['low', 'normal', 'high', 'critical'];
        $frequency = ['once', 'daily', 'weekly', 'bi-weekly', 'monthly', 'quarterly'];
        return [
            'title' => $this->faker->name(),
            'unit_id' => rand(1, 8),
            'status' => $status[rand(0, 4)],
            'description' => $this->faker->name(),
            'category_id' => rand(1, 8),
            'proirity' => $proirity[rand(0, 3)],
            'due_date' => now(),
            'preferred_maintenece_time' => null,
            'frequency' => $frequency[rand(0, 5)],
            'finished' => null,
        ];
    }
}
