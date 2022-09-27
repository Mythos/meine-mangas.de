<?php

namespace Database\Seeders;

use App\Constants\Permissions;
use Illuminate\Database\Seeder;
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
    public function run(): void
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();
        Permission::create(['name' => Permissions::USERS_EDIT]);
        Permission::create(['name' => Permissions::USERS_DELETE]);
        Permission::create(['name' => Permissions::PAGES_EDIT]);
        Permission::create(['name' => Permissions::PAGES_DELETE]);

        $user = Role::create(['name' => 'User']);

        $admin = Role::create(['name' => 'Administrator']);
        $admin->givePermissionTo(Permissions::USERS_EDIT);
        $admin->givePermissionTo(Permissions::USERS_DELETE);
        $admin->givePermissionTo(Permissions::PAGES_EDIT);
        $admin->givePermissionTo(Permissions::PAGES_DELETE);
    }
}
