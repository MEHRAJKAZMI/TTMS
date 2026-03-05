<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TrainingClass;
use App\Models\TrainingProgram;
use App\Models\User;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function __invoke(): View
    {
        return view('admin.dashboard', [
            'programCount' => TrainingProgram::count(),
            'classCount' => TrainingClass::count(),
            'trainerCount' => User::role('trainer')->count(),
            'teacherCount' => User::role('teacher')->count(),
        ]);
    }
}
