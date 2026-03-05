<?php

namespace App\Models;

use App\Enums\ClassCategory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TrainingClass extends Model
{
    use HasFactory;

    protected $fillable = [
        'training_program_id',
        'name',
        'category',
        'capacity',
        'starts_at',
        'ends_at',
    ];

    protected $casts = [
        'category' => ClassCategory::class,
        'starts_at' => 'datetime',
        'ends_at' => 'datetime',
    ];

    public function program(): BelongsTo
    {
        return $this->belongsTo(TrainingProgram::class, 'training_program_id');
    }

    public function trainers(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'class_trainer')->withTimestamps();
    }

    public function teachers(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'enrollments')
            ->withPivot(['status', 'progress_percent'])
            ->withTimestamps();
    }

    public function attendances(): HasMany
    {
        return $this->hasMany(Attendance::class, 'training_class_id');
    }

    public function assessments(): HasMany
    {
        return $this->hasMany(Assessment::class, 'training_class_id');
    }
}
