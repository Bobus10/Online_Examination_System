<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Student;
use App\Models\Subject;
use App\Models\Yearbook;
use App\Enums\UserRoleEnums;
use App\Models\FieldOfStudy;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        // $data = [
        //     'name' => 'Test',
        //     'email' => 'test@test.com',
        //     'password' => Hash::make('qwer1234'),
        //     'role' => UserRoleEnums::STUDENT,
        // ];

        // User::insert($data);
        // ->for(FieldOfStudy::factory()->has(
            //     Subject::factory(10)))
        User::factory(10)->has(
            Student::factory())
            ->create();

    }
}
