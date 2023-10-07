<?php

namespace Database\Factories;

use App\Models\DegreeCourse;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DegreeCourse>
 */
class DegreeCourseFactory extends Factory
{
    protected $model = DegreeCourse::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->text(10)
        ];
    }
}
