<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreResultRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user()?->can('manage assessments') ?? false;
    }

    public function rules(): array
    {
        return [
            'assessment_id' => ['required', 'exists:assessments,id'],
            'teacher_id' => ['required', 'exists:users,id'],
            'obtained_marks' => ['required', 'numeric', 'min:0'],
            'grade' => ['nullable', 'string', 'max:10'],
            'remarks' => ['nullable', 'string', 'max:1000'],
        ];
    }
}
