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
        Permission::create(['name' => 'view-any-category']);
        Permission::create(['name' => 'view-category']);
        Permission::create(['name' => 'create-category']);
        Permission::create(['name' => 'update-category']);
        Permission::create(['name' => 'delete-category']);
        Permission::create(['name' => 'restore-category']);
        Permission::create(['name' => 'force-delete-category']);

        // Maintenance
        Permission::create(['name' => 'view-any-maintenance']);
        Permission::create(['name' => 'view-maintenance']);
        Permission::create(['name' => 'create-maintenance']);
        Permission::create(['name' => 'update-maintenance']);
        Permission::create(['name' => 'delete-maintenance']);
        Permission::create(['name' => 'restore-maintenance']);
        Permission::create(['name' => 'force-delete-maintenance']);

        // Property
        Permission::create(['name' => 'view-any-property']);
        Permission::create(['name' => 'view-property']);
        Permission::create(['name' => 'create-property']);
        Permission::create(['name' => 'update-property']);
        Permission::create(['name' => 'delete-property']);
        Permission::create(['name' => 'restore-property']);
        Permission::create(['name' => 'force-delete-property']);

        // Type
        Permission::create(['name' => 'view-any-type']);
        Permission::create(['name' => 'view-type']);
        Permission::create(['name' => 'create-type']);
        Permission::create(['name' => 'update-type']);
        Permission::create(['name' => 'delete-type']);
        Permission::create(['name' => 'restore-type']);
        Permission::create(['name' => 'force-delete-type']);

        // Unit
        Permission::create(['name' => 'view-any-unit']);
        Permission::create(['name' => 'view-unit']);
        Permission::create(['name' => 'create-unit']);
        Permission::create(['name' => 'update-unit']);
        Permission::create(['name' => 'delete-unit']);
        Permission::create(['name' => 'restore-unit']);
        Permission::create(['name' => 'force-delete-unit']);



        // create roles and assign existing permissions
        $role1 = Role::create(['name' => 'app-manager']);
        // role1 category
        $role1->givePermissionTo('view-any-category');
        $role1->givePermissionTo('view-category');
        $role1->givePermissionTo('create-category');
        $role1->givePermissionTo('update-category');
        $role1->givePermissionTo('delete-category');
        $role1->givePermissionTo('restore-category');
        $role1->givePermissionTo('force-delete-category');

        // role1 maintenance
        $role1->givePermissionTo('view-any-maintenance');
        $role1->givePermissionTo('view-maintenance');
        $role1->givePermissionTo('create-maintenance');
        $role1->givePermissionTo('update-maintenance');
        $role1->givePermissionTo('delete-maintenance');
        $role1->givePermissionTo('restore-maintenance');
        $role1->givePermissionTo('force-delete-maintenance');

        // role1 property
        $role1->givePermissionTo('view-any-property');
        $role1->givePermissionTo('view-property');
        $role1->givePermissionTo('create-property');
        $role1->givePermissionTo('update-property');
        $role1->givePermissionTo('delete-property');
        $role1->givePermissionTo('restore-property');
        $role1->givePermissionTo('force-delete-property');

        // role1 type
        $role1->givePermissionTo('view-any-type');
        $role1->givePermissionTo('view-type');
        $role1->givePermissionTo('create-type');
        $role1->givePermissionTo('update-type');
        $role1->givePermissionTo('delete-type');
        $role1->givePermissionTo('restore-type');
        $role1->givePermissionTo('force-delete-type');

        // role1 unit
        $role1->givePermissionTo('view-any-unit');
        $role1->givePermissionTo('view-unit');
        $role1->givePermissionTo('create-unit');
        $role1->givePermissionTo('update-unit');
        $role1->givePermissionTo('delete-unit');
        $role1->givePermissionTo('restore-unit');
        $role1->givePermissionTo('force-delete-unit');


        // gets all permissions via Gate::before rule; see AuthServiceProvider

        // create demo users
        $user = \App\Models\User::factory()->create([
            'name' => 'App Admin User',
            'email' => 'appadmin@example.com',
            'password'=>Hash::make('azerty')
        ]);
        $user->assignRole($role1);


    }
}
