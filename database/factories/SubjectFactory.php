<?php

namespace Database\Factories;

use App\Models\Instructor;
use App\Models\Subject;
use App\Models\Yearbook;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Subject>
 */
class SubjectFactory extends Factory
{
    protected $model = Subject::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->text(20),
            'yearbook_id' => Yearbook::factory(),
            'instructor_id' => Instructor::factory(),
        ];
    }
}
