<?php

namespace App\Http\Requests;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;

class YearbookRequest extends FormRequest
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
        $minAcademicYear = Carbon::now()->subYears(5)->format('Y');
        $maxAcademicYear = Carbon::now()->addYears(5)->format('Y');

        return [
            'degree_course_id' => 'required|exists:degree_courses,id',
            'academic_year' => 'required|numeric|min:' . $minAcademicYear. '|max:' . $maxAcademicYear,
        ];
    }
}
