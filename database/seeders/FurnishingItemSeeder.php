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
        FurnishingItem::factory()->count(6)->create();
    }
}
