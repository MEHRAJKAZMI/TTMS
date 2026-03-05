<?php

namespace Database\Seeders;

use App\Enums\ClassCategory;
use App\Models\TrainingProgram;
use Illuminate\Database\Seeder;

class TrainingProgramSeeder extends Seeder
{
    public function run(): void
    {
        $program = TrainingProgram::create([
            'title' => 'Teacher Excellence Program',
            'description' => 'Core pedagogical training for all cadres.',
            'start_date' => now()->startOfMonth(),
            'end_date' => now()->addMonths(3),
            'is_active' => true,
        ]);

        foreach (ClassCategory::cases() as $category) {
            $program->classes()->create([
                'name' => "{$category->value} - Batch 1",
                'category' => $category,
                'capacity' => 40,
                'starts_at' => now()->addDays(5),
                'ends_at' => now()->addMonths(2),
            ]);
        }
    }
}
