<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('attendances', function (Blueprint $table): void {
            $table->id();
            $table->foreignId('training_class_id')->constrained('training_classes')->cascadeOnDelete();
            $table->foreignId('teacher_id')->constrained('users')->cascadeOnDelete();
            $table->date('attendance_date')->index();
            $table->enum('status', ['present', 'absent', 'leave'])->index();
            $table->string('remarks')->nullable();
            $table->timestamps();

            $table->unique(['training_class_id', 'teacher_id', 'attendance_date'], 'attendance_unique_day');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('attendances');
    }
};
