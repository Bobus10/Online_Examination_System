<?php

namespace Database\Seeders;

use App\Models\Answers;
use App\Models\Classes;
use App\Models\DegreeCourse;
use App\Models\Exams;
use App\Models\Instructors;
use App\Models\Questions;
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
        DegreeCourse::factory(2)
            ->has(Yearbook::factory(3)
                ->has(Classes::factory(4)
                    ->has(Student::factory())
                )
                ->has(Subject::factory(4)
                    ->has(Instructors::factory(1))
                    ->has(Exams::factory(4)
                        ->has(Questions::factory(5)
                            ->has(Answers::factory(3))
                        )
                    )
                )
            )
        ->create();
    }
}
