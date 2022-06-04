<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Company;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            'Safety', 'Cleaning', 'Gas & Electric', 'Cooling & Heating', 'Water & Pluming', 'Security', 'Trees and Clear Debris', 'Trash Receptacles', 'Other'
        ];

        foreach ($categories as $category) {

            $array = [];

            $array['name'] = $category;
            $array['user_id'] = 4;

            Category::factory()->create($array);
        }

        foreach ($categories as $category) {

            $array = [];

            $array['name'] = $category;
            $array['user_id'] = 3;

            Category::factory()->create($array);
        }
    }
}
