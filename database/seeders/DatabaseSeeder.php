<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            PermissionsSeeder::class,
            RoleSeeder::class,
            UserSeeder::class,
            CompanySeeder::class,
            UnitTypeSeeder::class,
            PropertyTypeSeeder::class,
            PropertySeeder::class,
            UnitSeeder::class,
            CategorySeeder::class,
            MaintenanceSeeder::class,
            FurnishingItemSeeder::class,
            AmenitySeeder::class,
            ServiceFeeSeeder::class,
            ProspectSeeder::class,
            ContractorSeeder::class,
            QuestionSeeder::class,
        ]);
    }
}
