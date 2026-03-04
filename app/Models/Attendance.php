<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;

    protected $fillable = ['training_class_id', 'teacher_id', 'attendance_date', 'status', 'remarks'];

    protected $casts = [
        'attendance_date' => 'date',
    ];
}
