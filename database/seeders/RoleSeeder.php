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
        Permission::create(['name' => 'view-user']);
        Permission::create(['name' => 'create-user']);
        Permission::create(['name' => 'edit-user']);
        Permission::create(['name' => 'delete-user']);

        Permission::create(['name' => 'view-post']);
        Permission::create(['name' => 'view-unpublished-post']);
        Permission::create(['name' => 'create-post']);
        Permission::create(['name' => 'edit-post']);
        Permission::create(['name' => 'delete-post']);
        Permission::create(['name' => 'edit-own-post']);
        Permission::create(['name' => 'delete-own-post']);

        $adminRole = Role::create(['name' => 'Admin']);
        $userRole = Role::create(['name' => 'User']);

        $adminRole->givePermissionTo([
            'view-user',
            'create-user',
            'edit-user',
            'delete-user',
            'view-post',
            'create-post',
            'edit-post',
            'delete-post',
        ]);
        
        $userRole->givePermissionTo([
            'view-unpublished-post',
            'view-post',
            'create-post',
            'edit-own-post',
            'delete-own-post',
        ]);
    }
}
