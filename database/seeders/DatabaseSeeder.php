<?php

namespace Database\Seeders;

use App\Models\Enrollment;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(MajorSeeder::class);
        $this->call(CourseSeeder::class);
        $this->call(AdminSeeder::class);
        $this->call(KaprodiSeeder::class);
        $this->call(MOSeeder::class);
        $this->call(StudentSeeder::class);
        $this->call(EnrollmentSeeder::class);
    }
}
