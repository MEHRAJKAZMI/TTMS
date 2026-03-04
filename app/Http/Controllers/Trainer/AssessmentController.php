<?php

namespace App\Http\Controllers\Trainer;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreResultRequest;
use App\Models\Result;
use Illuminate\Http\RedirectResponse;

class AssessmentController extends Controller
{
    public function storeResult(StoreResultRequest $request): RedirectResponse
    {
        Result::updateOrCreate(
            [
                'assessment_id' => $request->integer('assessment_id'),
                'teacher_id' => $request->integer('teacher_id'),
            ],
            $request->validated()
        );

        return back()->with('status', 'Result updated successfully.');
    }
}
