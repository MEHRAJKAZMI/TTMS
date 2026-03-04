<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assessment extends Model
{
    use HasFactory;

    protected $fillable = ['training_class_id', 'title', 'total_marks', 'assessment_date'];

    protected $casts = [
        'assessment_date' => 'date',
    ];
}
