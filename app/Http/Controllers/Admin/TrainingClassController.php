<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTrainingClassRequest;
use App\Models\TrainingClass;
use App\Services\AuditLogService;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class TrainingClassController extends Controller
{
    public function index(): View
    {
        $classes = TrainingClass::query()->with(['program', 'trainers'])->latest()->paginate(15);

        return view('classes.index', compact('classes'));
    }

    public function store(StoreTrainingClassRequest $request, AuditLogService $audit): RedirectResponse
    {
        $class = TrainingClass::create($request->validated());
        $audit->record('training_class.created', $class, $request->validated(), $request->user(), $request->ip());

        return back()->with('status', 'Class created successfully.');
    }
}
