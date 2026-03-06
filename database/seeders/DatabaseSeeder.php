<?php

namespace Database\Seeders;

use App\Enums\RoleName;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            RolePermissionSeeder::class,
            TrainingProgramSeeder::class,
        ]);

        User::factory()->create([
            'name' => 'System Admin',
            'email' => 'admin@ttms.test',
        ])->assignRole(RoleName::Admin->value);
    }
}
