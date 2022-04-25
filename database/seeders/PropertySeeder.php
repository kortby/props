<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\Property;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PropertySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Property::factory()->count(1)->create([
            'user_id'=>3,
            'company_id'=>Company::factory()->create([
                'user_id'=>3
            ])->id
        ]);

        Property::factory()->count(1)->create([
            'user_id'=>4,
            'company_id'=>Company::factory()->create([
                'user_id'=>3
            ])->id
        ]);
    }
}
