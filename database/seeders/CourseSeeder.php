<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Course;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $courses = [
            [
                'id' => 'IN101',
                'name' => 'Big Data',
                'sks' => 4,
                'period' => 'GANJIL24/25',
                'Major_id' => 'FTRC-001',
            ],
            [
                'id' => 'IN102',
                'name' => 'Basic Programming',
                'sks' => 4,
                'period' => 'GANJIL24/25',
                'Major_id' => 'FTRC-002',
            ],
            [
                'id' => 'IN103',
                'name' => 'Web Programming',
                'sks' => 4,
                'period' => 'GANJIL24/25',
                'Major_id' => 'FTRC-003',
            ],
            [
                'id' => 'IN104',
                'name' => 'Database Systems',
                'sks' => 3,
                'period' => 'GANJIL24/25',
                'Major_id' => 'FTRC-001',
            ],
            [
                'id' => 'IN105',
                'name' => 'Computer Networks',
                'sks' => 3,
                'period' => 'GANJIL24/25',
                'Major_id' => 'FTRC-002',
            ],

            [
                'id' => 'IN201',
                'name' => 'Machine Learning',
                'sks' => 4,
                'period' => 'GENAP24/25',
                'Major_id' => 'FTRC-001',
            ],
            [
                'id' => 'IN202',
                'name' => 'Object Oriented Programming',
                'sks' => 4,
                'period' => 'GENAP24/25',
                'Major_id' => 'FTRC-002',
            ],
            [
                'id' => 'IN203',
                'name' => 'Mobile Development',
                'sks' => 3,
                'period' => 'GENAP24/25',
                'Major_id' => 'FTRC-003',
            ],
            [
                'id' => 'IN204',
                'name' => 'Software Engineering',
                'sks' => 3,
                'period' => 'GENAP24/25',
                'Major_id' => 'FTRC-001',
            ],
            [
                'id' => 'IN205',
                'name' => 'Cybersecurity Basics',
                'sks' => 3,
                'period' => 'GENAP24/25',
                'Major_id' => 'FTRC-002',
            ],
        ];

        foreach ($courses as $courseData) {
            Course::create($courseData);
        }
    }
}
