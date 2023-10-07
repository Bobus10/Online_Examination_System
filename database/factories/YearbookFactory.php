<?php

namespace Database\Factories;

use App\Models\Classes;
use App\Models\Yearbook;
use App\Models\DegreeCourse;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Yearbook>
 */
class YearbookFactory extends Factory
{
    protected $model = Yearbook::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'degree_course_id' => DegreeCourse::factory(),
            'academic_year' => fake()->numberBetween(2019, 2023),
        ];
    }
}
