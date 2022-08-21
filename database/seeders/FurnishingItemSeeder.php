<?php

namespace Database\Seeders;

use App\Models\FurnishingItem;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FurnishingItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = ['Washer & dryer', 'Closet', 'Oven', 'Microwave', 'Dish Washer', 'Refrigerator'];
        foreach ($items as $item) {
            FurnishingItem::create([
                'name' => $item,
            ]);
        }
    }
}
