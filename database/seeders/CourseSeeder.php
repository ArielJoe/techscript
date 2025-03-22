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
        ];

        foreach ($courses as $courseData) {
            Course::create($courseData);
        }
    }
}
