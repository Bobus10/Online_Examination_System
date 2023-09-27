<?php

namespace Database\Factories;

use App\Models\Subject;
use App\Models\Yearbook;
use App\Models\Instructors;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Classes>
 */
class ClassesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id_yearbook' => Yearbook::factory(),
            'id_subject' => Subject::factory(),
            'id_instructor' => Instructors::factory(),
        ];
    }
}
