<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AuditLog extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'action', 'target_type', 'target_id', 'meta', 'ip_address'];

    protected $casts = [
        'meta' => 'array',
    ];
}
