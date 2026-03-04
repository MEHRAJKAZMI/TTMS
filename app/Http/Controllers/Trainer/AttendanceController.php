<?php

namespace App\Http\Controllers\Trainer;

use App\Http\Controllers\Controller;
use App\Models\Attendance;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class AttendanceController extends Controller
{
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'training_class_id' => ['required', 'exists:training_classes,id'],
            'teacher_id' => ['required', 'exists:users,id'],
            'attendance_date' => ['required', 'date'],
            'status' => ['required', 'in:present,absent,leave'],
            'remarks' => ['nullable', 'string', 'max:500'],
        ]);

        Attendance::updateOrCreate([
            'training_class_id' => $validated['training_class_id'],
            'teacher_id' => $validated['teacher_id'],
            'attendance_date' => $validated['attendance_date'],
        ], $validated);

        return back()->with('status', 'Attendance saved successfully.');
    }
}
