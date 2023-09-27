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

        Permission::create(['name' => 'manage users']);
        Permission::create(['name' => 'view any company']);
        Permission::create(['name' => 'manage companies']);
        Permission::create(['name' => 'view any grants']);
        Permission::create(['name' => 'manage grants']);
        Permission::create(['name' => 'manage categories']);

        $roleViewer->givePermissionTo(['view any company', 'view any grants']);
        $roleAdmin->givePermissionTo(Permission::all());
    }
}
