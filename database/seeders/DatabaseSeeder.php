<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\FieldOfStudy;
use App\Models\Student;
use App\Models\Subject;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        for($i = 1; $i <= 3; $i++) {
            $this->call([UserSeeder::class,]);
        }

        $this->call([
            // UserSeeder::class,
        ]);
    }
}
