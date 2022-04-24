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
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        $role2 = Role::create(['name' => 'Super-Admin']);

        $user = \App\Models\User::factory()->create([
            'name' => 'Super-Admin',
            'email' => 'superadmin@example.com',
            'password'=>Hash::make('azerty')
        ]);
        $user->assignRole($role2);

        // create permissions
        // Category
        foreach (config('permissions') as $permission) {

            Permission::create(['name'=>$permission]);

        }



        // create roles and assign existing permissions
        $role1 = Role::create(['name' => 'app-manager']);

        foreach (config('permissions') as $permission) {

            $role1->givePermissionTo($permission);

        }




        // gets all permissions via Gate::before rule; see AuthServiceProvider

        // create demo users
        $user = \App\Models\User::factory()->create([
            'name' => 'App Admin User',
            'email' => 'appadmin@example.com',
            'password'=>Hash::make('azerty')
        ]);
        $user->assignRole($role1);

        $role3 = Role::create(['name' => 'property-manager']);

        $pm = \App\Models\User::factory()->create([
            'name' => 'Property manager User',
            'email' => 'propertymanager@example.com',
            'password'=>Hash::make('azerty'),
            'user_id'=>$user->id
        ]);
        $pm->assignRole($role3);


    }
}
