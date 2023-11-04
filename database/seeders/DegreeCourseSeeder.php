<?php

namespace Database\Seeders;

use App\Models\Answer;
use App\Models\Classes;
use App\Models\DegreeCourse;
use App\Models\Exam;
use App\Models\Instructor;
use App\Models\Question;
use App\Models\Student;
use App\Models\Subject;
use App\Models\Yearbook;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DegreeCourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $currentLetter = 'A';
        $classesCount = 4;

        DegreeCourse::factory()
            ->has(Yearbook::factory(3)
                ->has(Classes::factory($classesCount)->state([
                    'label' => function () use (&$currentLetter, $classesCount) {
                        $letterNumber = ord($currentLetter) - ord('A') + 1;
                        if ($letterNumber > $classesCount) {
                            $currentLetter = 'A';
                        }
                        $label = $currentLetter;
                        $currentLetter++;
                        return $label;
                    }])
                    ->has(Student::factory(5))
                )
                ->has(Subject::factory(4)
                    ->has(Instructor::factory(1))
                    ->has(Exam::factory(4)
                        ->has(Question::factory(5)
                            ->has(Answer::factory(3))
                        )
                    )
                )
            )
        ->create();
    }
}
