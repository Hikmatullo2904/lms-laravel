<?php

namespace App\Http\Requests;

use App\Traits\FailedValidation;
use Illuminate\Foundation\Http\FormRequest;

class RoleCrudPermissionRequest extends FormRequest
{
    
    use FailedValidation;

    public function authorize(): bool
    {
        return true;
    }

    
    public function rules(): array
    {
        return [
            'permissions' => ['required', 'array'],
            'permissions.*' => ['required', 'exists:permissions,id']
        ];
    }
}
