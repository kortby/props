<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class PermissionsSeeder extends Seeder
{

    //use WithoutModelEvents;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        $role1 = Role::create(['name' => 'Super-Admin']);

        $user = \App\Models\User::factory()->create([
            'name' => 'Super-Admin',
            'email' => 'superadmin@example.com',
            'password' => Hash::make('azerty'),
            'phone' => rand(4151001000, 4159998888),
        ]);
        $user->assignRole($role1);

        foreach (config('permissions') as $resource) {
            foreach ($resource as $permission) {
                Permission::create(['name' => $permission]);
            }
        }

        // create roles and assign existing permissions
        $role2 = Role::create(['name' => 'app-manager']);

        foreach (Permission::all() as $permission) {
            $role2->givePermissionTo($permission->name);
            $role1->givePermissionTo($permission->name);
        }


        // gets all permissions via Gate::before rule; see AuthServiceProvider

        // create demo users
        $user = \App\Models\User::factory()->create([
            'name' => 'App Admin User',
            'email' => 'appadmin@example.com',
            'password' => Hash::make('azerty'),
            'phone' => rand(4151001000, 4159998888),
        ]);
        $user->assignRole($role1);

        $role3 = Role::create(['name' => 'property-manager']);
        $role4 = Role::create(['name' => 'property-agent']);

        foreach (config('permissions') as $key => $resource) {

            if (in_array($key, ['users', 'company', 'property', 'unit'])) {
                foreach ($resource as $permission) {
                    $role3->givePermissionTo($permission);
                }
            }

            if (in_array($key, ['users', 'property', 'unit'])) {
                foreach ($resource as $permission) {
                    $role4->givePermissionTo($permission);
                }
            }
        }

        $pm = \App\Models\User::factory()->create([
            'name' => 'Property manager User',
            'email' => 'propertymanager@example.com',
            'password' => Hash::make('azerty'),
            'phone' => rand(4151001000, 4159998888),
        ]);
        $pm->assignRole($role3);

        $pa = \App\Models\User::factory()->create([
            'name' => 'Property agent',
            'email' => 'propertyagent@example.com',
            'password' => Hash::make('azerty'),
            'phone' => rand(4151001000, 4159998888),
            'user_id' => $pm->id
        ]);
        $pa->assignRole($role4);

        $pm2 = \App\Models\User::factory()->create([
            'name' => 'Property manager User 2',
            'email' => 'propertymanager2@example.com',
            'phone' => rand(4151001000, 4159998888),
            'password' => Hash::make('azerty')

        ]);
        $pm2->assignRole($role3);

        $pa2 = \App\Models\User::factory()->create([
            'name' => 'Property agent 2',
            'email' => 'propertyagent2@example.com',
            'phone' => rand(4151001000, 4159998888),
            'password' => Hash::make('azerty'),
            'user_id' => $pm2->id
        ]);
        $pa2->assignRole($role4);

        $role5 = Role::create(['name' => 'renter']);
    }
}
