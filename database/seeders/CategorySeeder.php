<?php

namespace Database\Seeders;

use App\Models\Category;
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
            'Safety', 'Cleaning', 'Gas & Electric', 'Cooling & Heating', 'Water & Pluming', 'Security', 'Trees and Clear Debris', 'Trash Receptacles'
        ];

        foreach ($categories as $category) {
            Category::create(['name' => $category]);
        }
    }
}
