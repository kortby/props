<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sa = \App\Models\User::factory()->create([
            'name' => 'Super-Admin',
            'email' => 'superadmin@example.com',
            'password' => Hash::make('l^zL3z&E1y84'),
            'phone' => rand(4151001000, 4159998888),
        ]);
        $sa->assignRole(1);

        $appAdmin = \App\Models\User::factory()->create([
            'name' => 'App Admin User',
            'email' => 'appadmin@example.com',
            'password' => Hash::make('azerty'),
            'phone' => rand(4151001000, 4159998888),
        ]);
        $appAdmin->assignRole(2);

        $co1 = \App\Models\User::factory()->create([
            'name' => 'Company Owner User 1',
            'email' => 'company-owner@example.com',
            'password' => Hash::make('azerty'),
            'phone' => rand(4151001000, 4159998888),
        ]);
        $co1->assignRole(3);

        $co2 = \App\Models\User::factory()->create([
            'name' => 'Company Owner User 2',
            'email' => 'company-owner2@example.com',
            'password' => Hash::make('azerty'),
            'phone' => rand(4151001000, 4159998888),
        ]);
        $co2->assignRole(3);

        $pm = \App\Models\User::factory()->create([
            'name' => 'Property manager User',
            'email' => 'propertymanager@example.com',
            'password' => Hash::make('azerty'),
            'phone' => rand(4151001000, 4159998888),
            'parent_id' => $co1->id
        ]);
        $pm->assignRole(4);

        $pa = \App\Models\User::factory()->create([
            'name' => 'Property agent',
            'email' => 'propertyagent@example.com',
            'password' => Hash::make('azerty'),
            'phone' => rand(4151001000, 4159998888),
            'parent_id' => $pm->id
        ]);
        $pa->assignRole(5);

        $pm2 = \App\Models\User::factory()->create([
            'name' => 'Property manager User 2',
            'email' => 'propertymanager2@example.com',
            'phone' => rand(4151001000, 4159998888),
            'password' => Hash::make('azerty'),
            'parent_id' => $co2->id

        ]);
        $pm2->assignRole(4);

        $pa2 = \App\Models\User::factory()->create([
            'name' => 'Property agent 2',
            'email' => 'propertyagent2@example.com',
            'phone' => rand(4151001000, 4159998888),
            'password' => Hash::make('azerty'),
            'parent_id' => $co2->id
        ]);
        $pa2->assignRole(5);

        $pa2 = \App\Models\User::factory()->create([
            'name' => 'Renter',
            'email' => 'renter@example.com',
            'phone' => rand(4151001000, 4159998888),
            'password' => Hash::make('azerty'),
            'parent_id' => $co1->id
        ]);
        $pa2->assignRole(6);
    }
}
