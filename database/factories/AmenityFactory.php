<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Amenity>
 */
class AmenityFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $amenities = ['Club Room', 'Guest Suite'];
        return [
            'name' => $amenities[rand(0, 1)],
            'description' => 'Maximum Reservation Time:4 hrs
            Must be booked at least:2 Days in advance and no more than 60 Days in advance
            Individual Max Reservations Per Day:3
            Cleaning Fee:$100.00',
            'price' => 100,
        ];
    }
}
