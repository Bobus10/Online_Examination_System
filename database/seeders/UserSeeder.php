<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $data = [
            'name' => 'Test',
            'first_name' => 'test name',
            'surname' => 'test surname',
            'email' => 'test@test.com',
            'password' => Hash::make('qwer1234'),
        ];

        User::insert($data);
    }
}
