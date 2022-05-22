<?php

namespace Database\Seeders;

use App\Models\PropertyType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PropertyTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = ['Residential', 'Commercial', 'Affordable Housing', 'Student Housing', 'Comminity Associations', 'Mobile Homes', 'Self Storage'];
        foreach ($types as $type) {
            PropertyType::create([
                'name' => $type,
                'user_id' => rand(5,7),
            ]);
        }
    }
}
