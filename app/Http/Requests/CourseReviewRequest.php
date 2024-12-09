<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CourseReviewRequest extends FormRequest
{
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
            'rating' => 'required',
            'comment' => 'nullable|string',
            'course_id' => 'required|exists:courses,id'
        ];
    }
}