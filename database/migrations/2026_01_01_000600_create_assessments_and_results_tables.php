<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('assessments', function (Blueprint $table): void {
            $table->id();
            $table->foreignId('training_class_id')->constrained('training_classes')->cascadeOnDelete();
            $table->string('title');
            $table->unsignedSmallInteger('total_marks');
            $table->date('assessment_date')->index();
            $table->timestamps();
        });

        Schema::create('results', function (Blueprint $table): void {
            $table->id();
            $table->foreignId('assessment_id')->constrained('assessments')->cascadeOnDelete();
            $table->foreignId('teacher_id')->constrained('users')->cascadeOnDelete();
            $table->decimal('obtained_marks', 5, 2);
            $table->string('grade', 10)->nullable();
            $table->string('remarks')->nullable();
            $table->timestamps();
            $table->unique(['assessment_id', 'teacher_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('results');
        Schema::dropIfExists('assessments');
    }
};
