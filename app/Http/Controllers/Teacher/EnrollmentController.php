<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\TrainingClass;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class EnrollmentController extends Controller
{
    public function store(Request $request, TrainingClass $class): RedirectResponse
    {
        $request->user()->trainingClasses()->syncWithoutDetaching([
            $class->id => ['status' => 'enrolled', 'progress_percent' => 0],
        ]);

        return back()->with('status', 'Enrolled successfully.');
    }
}
