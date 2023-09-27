<?php

namespace Database\Factories;

use App\Models\FieldOfStudy;
use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Yearbook>
 */
class YearbookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id_student' =>Student::factory(),
            'id_field_of_study' =>FieldOfStudy::factory(),
            'academic_year' => fake()->numberBetween(2020, 2025),
        ];
    }
}
