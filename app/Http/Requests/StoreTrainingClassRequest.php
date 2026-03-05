<?php

namespace App\Http\Requests;

use App\Enums\ClassCategory;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreTrainingClassRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user()?->can('manage classes') ?? false;
    }

    public function rules(): array
    {
        return [
            'training_program_id' => ['required', 'integer', 'exists:training_programs,id'],
            'name' => ['required', 'string', 'max:255'],
            'category' => ['required', Rule::enum(ClassCategory::class)],
            'capacity' => ['required', 'integer', 'min:1', 'max:1000'],
            'starts_at' => ['required', 'date'],
            'ends_at' => ['required', 'date', 'after:starts_at'],
        ];
    }
}
