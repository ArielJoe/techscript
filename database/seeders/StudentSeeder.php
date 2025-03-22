<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $students = [
            [
                'id' => '4001',
                'email' => 'student1@gmail.com',
                'password' => Hash::make('123456'),
                'role' => 4,
                'created_at' => now(),
                'updated_at' => now(),
                'Major_id' => 'FTRC-001',
            ],
            [
                'id' => '4002',
                'email' => 'student2@gmail.com',
                'password' => Hash::make('123456'),
                'role' => 4,
                'created_at' => now(),
                'updated_at' => now(),
                'Major_id' => 'FTRC-002',
            ],
            [
                'id' => '4003',
                'email' => 'student3@gmail.com',
                'password' => Hash::make('123456'),
                'role' => 4,
                'created_at' => now(),
                'updated_at' => now(),
                'Major_id' => 'FTRC-003',
            ],
        ];

        foreach ($students as $studentData) {
            User::create($studentData);
        }
    }
}
