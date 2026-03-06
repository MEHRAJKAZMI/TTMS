<?php

namespace App\Enums;

enum RoleName: string
{
    case Admin = 'admin';
    case Trainer = 'trainer';
    case Teacher = 'teacher';
    case Editor = 'editor';
}
