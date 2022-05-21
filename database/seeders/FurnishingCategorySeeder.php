<?php

namespace Database\Seeders;

use App\Models\FurnishingCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FurnishingCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       /* $categories = ['Bedroom', 'Kitchen', 'Bathroom', 'Living Room'];
        foreach ($categories as $category) {
            FurnishingCategory::create(['name' => $category]);
        }*/

        FurnishingCategory::factory()->count(3)->create([
             'user_id'=>5
        ]);

        FurnishingCategory::factory()->count(7)->create([
            'user_id'=>7
        ]);

    }
}
