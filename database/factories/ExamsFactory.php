<?php

namespace Database\Factories;

use App\Models\Exams;
use App\Models\Subject;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Exams>
 */
class ExamsFactory extends Factory
{
    protected $model = Exams::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'subject_id' => Subject::factory(),
            'pass_rate' => 51,
        ];
    }
}
