<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Major;

class MajorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $majors = [
            [
                'id' => 'FTRC-001',
                'name' => 'Ilmu Komputer',
            ],
            [
                'id' => 'FTRC-002',
                'name' => 'Teknik Informatika',
            ],
            [
                'id' => 'FTRC-003',
                'name' => 'Sistem Informasi',
            ],
        ];

        foreach ($majors as $majorData) {
            Major::create($majorData);
        }
    }
}
