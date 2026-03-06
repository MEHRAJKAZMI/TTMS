<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasFactory;
    use HasRoles;
    use Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function trainingClasses(): BelongsToMany
    {
        return $this->belongsToMany(TrainingClass::class, 'enrollments')
            ->withPivot(['status', 'progress_percent'])
            ->withTimestamps();
    }

    public function trainedClasses(): BelongsToMany
    {
        return $this->belongsToMany(TrainingClass::class, 'class_trainer')
            ->withTimestamps();
    }
}
