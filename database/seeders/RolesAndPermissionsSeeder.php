<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Log;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run()
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::create(['name' => 'assign roles and permissions']);
        Permission::create(['name' => 'create']);
        Permission::create(['name' => 'edit']);
        Permission::create(['name' => 'delete']);

        // create roles and assign created permissions
        Role::create(['name' => 'editor'])
            ->givePermissionTo(['create', 'edit', 'delete']);
        Role::create(['name' => 'assistant-editor'])
            ->givePermissionTo('edit');

        Role::create(['name' => 'super-admin'])
            ->givePermissionTo(Permission::all());

        // create a super-admin is there is not one yet
        if (User::role('super-admin')->get()->count() === 0) {
            $user = User::find(1);
            if ($user !== null) {
                $user->assignRole('super-admin');
                Log::info(__CLASS__." User 1 ({$user->name}) has been named super-admin");
            } else {
                Log::warning(__CLASS__." Can't find a user to name it super-admin");
            }
        }
    }
}
