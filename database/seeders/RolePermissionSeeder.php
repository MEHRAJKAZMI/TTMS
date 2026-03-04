<?php

namespace Database\Seeders;

use App\Enums\RoleName;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    public function run(): void
    {
        $permissions = [
            'manage users',
            'manage classes',
            'assign trainers',
            'enroll teachers',
            'manage attendance',
            'manage assessments',
            'generate certificates',
            'export reports',
            'view audit logs',
        ];

        foreach ($permissions as $permission) {
            Permission::findOrCreate($permission);
        }

        $admin = Role::findOrCreate(RoleName::Admin->value);
        $trainer = Role::findOrCreate(RoleName::Trainer->value);
        $teacher = Role::findOrCreate(RoleName::Teacher->value);
        $editor = Role::findOrCreate(RoleName::Editor->value);

        $admin->syncPermissions($permissions);
        $trainer->syncPermissions(['manage attendance', 'manage assessments']);
        $teacher->syncPermissions(['enroll teachers']);
        $editor->syncPermissions(['generate certificates', 'export reports']);
    }
}
