<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sa=Role::create(['name' => 'Super-Admin']); //ID 1
        $am=Role::create(['name' => 'app-manager']); //ID 2
        $co=Role::create(['name' => 'company-owner']); //ID 3
        $pm=Role::create(['name' => 'property-manager']); //ID 4
        $pa=Role::create(['name' => 'property-agent']); //ID 5
        $r=Role::create(['name' => 'renter']); //ID 6

        foreach (config('permissions') as $key => $resource) {
            if (in_array($key, ['users', 'company', 'prospect'])) {
                foreach ($resource as $permission) {
                    $sa->givePermissionTo($permission);
                    $am->givePermissionTo($permission);
                }
            }
        }

        foreach (config('permissions') as $key => $resource) {

            if (!in_array($key, ['prospect'])) {
                foreach ($resource as $permission) {
                    $co->givePermissionTo($permission);
                }
            }

            if (!in_array($key, ['prospect', 'company'])) {
                foreach ($resource as $permission) {
                    $pm->givePermissionTo($permission);
                }
            }

            if (in_array($key, ['unit', 'unit-feature', 'unit-type'])) {
                foreach ($resource as $permission) {
                    $pa->givePermissionTo($permission);
                }
            }
        }
    }
}
