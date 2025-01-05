<?php

namespace App\Http\Requests;

use App\Traits\FailedValidation;
use Illuminate\Foundation\Http\FormRequest;

class GetCoursesRequest extends FormRequest
{

    use FailedValidation;

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'page' => 'required|integer|min:1',
            'size' => 'required|integer|min:1',
            'user_id' => 'integer|nullable',
            'category_id' => 'integer|nullable'
        ];
    }
}
