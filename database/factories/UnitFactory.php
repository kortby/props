<?php

namespace Database\Factories;

use App\Models\Unit;
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
            'number_of_bedroom' => rand(1, 5),
            'number_of_bathroom' => rand(1, 3),
            'number_of_balcony' => rand(0, 3),
            'date_available_from' => now(),
            'is_active' => rand(0, 1) == 1,
            'description' => $this->faker->sentence,
            'unit_number' => rand(0, 1000),
            'unit_floor_number' => rand(0, 10),
            'size' => rand(300, 1240),
            'price' => rand(700, 3240),
            'parking_spot' => rand(3, 100),
            'is_air_conditioning' => rand(0, 1) == 1,
            'has_carpet' => rand(0, 1) == 1,
            'has_hardwood_flooring' => rand(0, 1) == 1,
            'is_ceiling_fan_cooling' => rand(0, 1) == 1,
            'has_in_unit_fireplace' => rand(0, 1) == 1,
            'has_in_unit_garden' => rand(0, 1) == 1,
            'has_in_unit_laundry' => rand(0, 1) == 1,
            'has_walkin_closet' => rand(0, 1) == 1,
            'are_pets_allowed' => rand(0, 1) == 1,
        ];
    }

    // public function configure()
    // {
    //     return $this->afterCreating(function (Unit $unit) {
    //         $imageUrl1 = '/factory/units/Studio_S05_480Sqft.jpg';
    //         $imageUrl2 = '/factory/units/image.jpg';
    //         $imageUrl3 = '/factory/units/love-apartment-1200x630-cropped.jpg';
    //         $unit->addMediaFromDisk($imageUrl1)->preservingOriginal()->toMediaCollection('units_collection');
    //         $unit->addMediaFromDisk($imageUrl2)->preservingOriginal()->toMediaCollection('units_collection');
    //         $unit->addMediaFromDisk($imageUrl3)->preservingOriginal()->toMediaCollection('units_collection');
    //     });
    // }
}
