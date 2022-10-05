<?php

namespace Database\Seeders;

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
        // $role = Role::create(['name' => 'admin']);
        // $role = Role::create(['name' => 'user']);

        // $permission = Permission::create(['name' => 'create-user']);
        Permission::create(['name' => 'create-user']);
        Permission::create(['name' => 'edit-user']);
        Permission::create(['name' => 'delete-user']);

        Permission::create(['name' => 'create-post']);
        Permission::create(['name' => 'edit-post']);
        Permission::create(['name' => 'delete-post']);

        $adminRole = Role::create(['name' => 'Admin']);
        $userRole = Role::create(['name' => 'User']);

        $adminRole->givePermissionTo([
            'create-user',
            'edit-user',
            'delete-user',
            'create-post',
            'edit-post',
            'delete-post',
        ]);

        $userRole->givePermissionTo([
            'create-post',
            'edit-post',
            'delete-post',
        ]);
    }
}
