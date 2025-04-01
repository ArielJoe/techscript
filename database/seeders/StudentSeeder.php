<?php

namespace Database\Seeders;

use App\Models\Student;
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
        $users = [
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

        $students = [
            [
                'id' => 'STU4001',
                'full_name' => 'John Doe',
                'address' => '123 Main Street, City A',
                'phone_number' => '081234567890',
                'graduation_date' => null,
                'enrollment_date' => '2021-09-01',
                'status' => 1,
                'user_id' => '4001',
            ],
            [
                'id' => 'STU4002',
                'full_name' => 'Jane Smith',
                'address' => '456 Oak Avenue, City B',
                'phone_number' => '081234567891',
                'graduation_date' => null,
                'enrollment_date' => '2021-09-01',
                'status' => 1,
                'user_id' => '4002',
            ],
            [
                'id' => 'STU4003',
                'full_name' => 'Alice Johnson',
                'address' => '789 Pine Road, City C',
                'phone_number' => '081234567892',
                'graduation_date' => null,
                'enrollment_date' => '2021-09-01',
                'status' => 1,
                'user_id' => '4003',
            ],
        ];

        foreach ($users as $usersData) {
            User::create($usersData);
        }

        foreach ($students as $studentData) {
            Student::create($studentData);
        }
    }
}
