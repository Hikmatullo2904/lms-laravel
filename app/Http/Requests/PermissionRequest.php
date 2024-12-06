<?php

namespace App\Http\Requests;

use App\Traits\FailedValidation;
use Illuminate\Foundation\Http\FormRequest;

class PermissionRequest extends FormRequest
{
    use FailedValidation;
    
    public function authorize(): bool
    {
        return true;
    }

    
    public function rules(): array
    {
        return [
            'name' => ['required', 'max:255', 'unique:permissions']
        ];
    }
}
