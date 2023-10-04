<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class PermissionSeeder extends Seeder
{
    public function run(): void
    {
        app(PermissionRegistrar::class)->forgetCachedPermissions();

        /** @var Role $roleViewer */
        $roleViewer = Role::create(['name' => 'viewer']);

        /** @var Role $roleAdmin */
        $roleAdmin = Role::create(['name' => 'admin']);

        /** @var Role $roleEditor */
        $roleEditor = Role::create(['name' => 'editor']);

        /** @var Role $roleManager */
        $roleManager = Role::create(['name' => 'manager']);

        Permission::create(['name' => 'manage users']);
        Permission::create(['name' => 'view any company']);
        Permission::create(['name' => 'add companies']);
        Permission::create(['name' => 'manage companies']);
        Permission::create(['name' => 'view any grant']);
        Permission::create(['name' => 'add grants']);
        Permission::create(['name' => 'manage grants']);
        Permission::create(['name' => 'manage categories']);

        $roleViewer->givePermissionTo(['view any company', 'view any grants']);
        $roleEditor->givePermissionTo(['view any company', 'view any grants', 'add companies', 'add grants']);
        $roleManager->givePermissionTo(['view any company', 'view any grants', 'manage companies', 'manage grants']);
        $roleAdmin->givePermissionTo(Permission::all());
    }
}
