<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Enrollment;

class EnrollmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $enrollments = [
            [
                'id' => 'ENR00001',
                'Course_id' => 'IN101',
                'Student_id' => 'STU4001',
            ],
            [
                'id' => 'ENR00002',
                'Course_id' => 'IN103',
                'Student_id' => 'STU4001',
            ],
            [
                'id' => 'ENR00003',
                'Course_id' => 'IN201',
                'Student_id' => 'STU4001',
            ],
            [
                'id' => 'ENR00004',
                'Course_id' => 'IN204',
                'Student_id' => 'STU4001',
            ],
            [
                'id' => 'ENR00005',
                'Course_id' => 'IN102',
                'Student_id' => 'STU4002',
            ],
            [
                'id' => 'ENR00006',
                'Course_id' => 'IN104',
                'Student_id' => 'STU4002',
            ],
            [
                'id' => 'ENR00007',
                'Course_id' => 'IN202',
                'Student_id' => 'STU4002',
            ],
            [
                'id' => 'ENR00008',
                'Course_id' => 'IN205',
                'Student_id' => 'STU4002',
            ],
            [
                'id' => 'ENR00009',
                'Course_id' => 'IN105',
                'Student_id' => 'STU4003',
            ],
            [
                'id' => 'ENR00010',
                'Course_id' => 'IN101',
                'Student_id' => 'STU4003',
            ],
            [
                'id' => 'ENR00011',
                'Course_id' => 'IN203',
                'Student_id' => 'STU4003',
            ],
        ];

        foreach ($enrollments as $enrollmentData) {
            Enrollment::create($enrollmentData);
        }
    }
}
