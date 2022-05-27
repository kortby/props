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
            'unit_feature_id' => rand(1, 9),
            'number_of_bedroom' => rand(1, 5),
            'number_of_bathroom' => rand(1, 3),
            'number_of_balcony' => rand(0, 3),
            'date_available_from' => now(),
            'is_active' => true,
            'description' => $this->faker->sentence,
            'unit_number' => rand(0, 1000),
            'unit_floor_number' => rand(0, 10),
            'size' => rand(300, 1240),
            'price' => rand(700, 3240),
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function (Unit $unit) {
            $imageUrl1 = 'https://www.cityviewapts.com/uploads/floorplans/images/1336x1336G/80956/Studio_S05_480Sqft.jpg?1564582365';
            $imageUrl2 = 'https://image1.apartmentfinder.com/i2/DoSkR2Q6HnD7k7exBblnHcPtkR_0qNnddaO0dCfUgMY/110/image.jpg';
            $imageUrl3 = 'https://www.becomingminimalist.com/wp-content/uploads/2020/06/love-apartment-1200x630-cropped.jpg';
            $unit->addMediaFromUrl($imageUrl1)->toMediaCollection('units_collection');
            $unit->addMediaFromUrl($imageUrl2)->toMediaCollection('units_collection');
            $unit->addMediaFromUrl($imageUrl3)->toMediaCollection('units_collection');
        });
    }
}
