<?php

namespace Database\Seeders;

use App\Models\Unit;
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
        Unit::factory()->count(50)->create([
            'property_id'=>1,
            'user_id'=>3
        ]);

        Unit::factory()->count(50)->create([
            'property_id'=>2,
            'user_id'=>4
        ]);
    }
}
