<?php

namespace App\Http\Requests;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;

class StudentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $subEighteenYears = Carbon::now()->subYear()->format("Y-m-d");

        return [
            'user_id' => 'exists:users,id',
            'classes_id' => 'exists:classes,id',
            'first_name' => 'required|string|min:2|max:255',
            'surname' => 'required|string|min:2|max:255',
            'date_of_birth' => 'required|date|before_or_equal:' . $subEighteenYears,
        ];
    }
}
