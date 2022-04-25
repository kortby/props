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
            'password'=>Hash::make('azerty')
        ]);
        $user->assignRole($role1);

        foreach (config('permissions') as $permission) {

            Permission::create(['name'=>$permission]);

        }

        // create roles and assign existing permissions
        $role2 = Role::create(['name' => 'app-manager']);

        foreach (Permission::all() as $permission) {

            $role2->givePermissionTo($permission->name);

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

        $pm2 = \App\Models\User::factory()->create([
            'name' => 'Property manager User 2',
            'email' => 'propertymanager2@example.com',
            'password'=>Hash::make('azerty'),
            'user_id'=>$user->id
        ]);
        $pm2->assignRole($role3);


    }
}
