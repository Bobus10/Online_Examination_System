<?php

namespace App\Http\Requests;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;

class InstructorRequest extends FormRequest
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
        $dateOfBirth = $this->input('date_of_birth');
        $addEighteenYears = Carbon::parse($dateOfBirth)->addYears(18)->format('Y-m-d');
        $subEighteenYears = Carbon::now()->subYears(18)->format('Y-m-d');

        return [
            'first_name' => 'required|string|min:3|max:30',
            'surname' => 'required|string|min:3|max:30',
            'date_of_birth' => 'required|date|before_or_equal:' . $subEighteenYears,
            'hire_date' => 'required|date|after_or_equal:' . $addEighteenYears,
            'salary' => 'numeric|min:0|max:100000',
        ];
    }
}
