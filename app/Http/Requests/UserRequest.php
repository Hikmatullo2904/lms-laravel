<?php

namespace App\Http\Requests;

use App\Traits\FailedValidation;
use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    use FailedValidation;
    
    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
            'first_name' => 'required',
            'last_name' => 'required',
            'username' => 'required|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:4'
        ];
    }
}
