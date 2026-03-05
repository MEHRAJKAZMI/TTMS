<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EnrollInClassRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user()?->can('enroll teachers') ?? false;
    }

    public function rules(): array
    {
        return [];
    }
}
