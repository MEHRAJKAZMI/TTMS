<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('class_trainer', function (Blueprint $table): void {
            $table->id();
            $table->foreignId('training_class_id')->constrained('training_classes')->cascadeOnDelete();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->timestamps();
            $table->unique(['training_class_id', 'user_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('class_trainer');
    }
};
