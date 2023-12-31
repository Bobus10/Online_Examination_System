<?php

namespace Database\Factories;

use App\Models\Classes;
use App\Models\Student;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    protected $model = Student::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'classes_id' => Classes::factory(),
            'first_name' => fake()->firstName(),
            'surname' => fake()->lastName(),
            'date_of_birth' => fake()->date(),
        ];
    }
}
