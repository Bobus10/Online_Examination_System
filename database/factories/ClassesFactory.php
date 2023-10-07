<?php

namespace Database\Factories;

use App\Models\Classes;
use App\Models\Student;
use App\Models\Yearbook;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Classes>
 */
class ClassesFactory extends Factory
{
    protected $model = Classes::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'student_id' => Student::factory(),
            'yearbook_id' => Yearbook::factory(),
        ];
    }
}
