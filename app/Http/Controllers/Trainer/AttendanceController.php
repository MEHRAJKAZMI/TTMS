<?php

namespace App\Http\Controllers\Trainer;

use App\Http\Controllers\Controller;
use App\Models\Attendance;
use App\Models\TrainingClass;
use App\Services\AuditLogService;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class AttendanceController extends Controller
{
    public function store(Request $request, AuditLogService $audit): RedirectResponse
    {
        $validated = $request->validate([
            'training_class_id' => ['required', 'exists:training_classes,id'],
            'teacher_id' => ['required', 'exists:users,id'],
            'attendance_date' => ['required', 'date'],
            'status' => ['required', 'in:present,absent,leave'],
            'remarks' => ['nullable', 'string', 'max:500'],
        ]);

        $class = TrainingClass::query()->with('trainers:id')->findOrFail($validated['training_class_id']);

        if (! $class->trainers->pluck('id')->contains($request->user()->id)) {
            abort(403, 'You are not assigned to this class.');
        }

        $attendance = Attendance::updateOrCreate([
            'training_class_id' => $validated['training_class_id'],
            'teacher_id' => $validated['teacher_id'],
            'attendance_date' => $validated['attendance_date'],
        ], $validated);

        $audit->record('attendance.upserted', $attendance, $validated, $request->user(), $request->ip());

        return back()->with('status', 'Attendance saved successfully.');
    }
}
