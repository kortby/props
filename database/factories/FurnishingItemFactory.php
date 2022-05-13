<?php

namespace Database\Factories;

use App\Models\FurnishingCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\FurnishingItem>
 */
class FurnishingItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $items = ['Washer & dryer', 'Closet', 'Oven', 'Microwave', 'Dish Washer', 'Refrigerator'];
        return [
            'name' => $items[rand(0, 5)],
            'furnishing_category_id' => FurnishingCategory::factory()->create()->id,
        ];
    }
}
