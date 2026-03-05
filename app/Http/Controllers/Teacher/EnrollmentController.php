<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Http\Requests\EnrollInClassRequest;
use App\Models\TrainingClass;
use App\Services\AuditLogService;
use Illuminate\Http\RedirectResponse;

class EnrollmentController extends Controller
{
    public function store(EnrollInClassRequest $request, TrainingClass $class, AuditLogService $audit): RedirectResponse
    {
        $alreadyEnrolled = $request->user()
            ->trainingClasses()
            ->where('training_class_id', $class->id)
            ->exists();

        if ($alreadyEnrolled) {
            return back()->with('status', 'You are already enrolled in this class.');
        }

        if ($class->teachers()->count() >= $class->capacity) {
            return back()->with('status', 'Class capacity has been reached.');
        }

        $request->user()->trainingClasses()->syncWithoutDetaching([
            $class->id => ['status' => 'enrolled', 'progress_percent' => 0],
        ]);

        $audit->record('enrollment.created', $class, [
            'teacher_id' => $request->user()->id,
            'training_class_id' => $class->id,
        ], $request->user(), $request->ip());

        return back()->with('status', 'Enrolled successfully.');
    }
}
