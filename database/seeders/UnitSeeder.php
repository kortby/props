<?php

namespace Database\Seeders;

use App\Models\Unit;
use Faker\Factory as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Unit::factory()->count(20)->create([
            'property_id' => 1,
            'user_id' => 3
        ]);

        Unit::factory()->count(20)->create([
            'property_id' => 2,
            'user_id' => 4
        ]);

       /* $imageUrl = 'https://picsum.photos/id/1008/584/876';

        for ($i = 1; $i <= 40; $i++) {
            Unit::find($i)->addMediaFromUrl($imageUrl)->toMediaCollection('images');
        }*/
    }
}
