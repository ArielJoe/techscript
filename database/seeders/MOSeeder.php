<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\MO;
use Illuminate\Support\Facades\Hash;

class MOSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'id' => '3001',
                'email' => 'mo_ik1@gmail.com',
                'password' => Hash::make('123456'),
                'role' => 3,
                'created_at' => now(),
                'updated_at' => now(),
                'Major_id' => 'FTRC-001',
            ],
            [
                'id' => '3002',
                'email' => 'mo_ik2@gmail.com',
                'password' => Hash::make('123456'),
                'role' => 3,
                'created_at' => now(),
                'updated_at' => now(),
                'Major_id' => 'FTRC-001',
            ],
            [
                'id' => '3003',
                'email' => 'mo_ti1@gmail.com',
                'password' => Hash::make('123456'),
                'role' => 3,
                'created_at' => now(),
                'updated_at' => now(),
                'Major_id' => 'FTRC-002',
            ],
            [
                'id' => '3004',
                'email' => 'mo_ti2@gmail.com',
                'password' => Hash::make('123456'),
                'role' => 3,
                'created_at' => now(),
                'updated_at' => now(),
                'Major_id' => 'FTRC-002',
            ],
            [
                'id' => '3005',
                'email' => 'mo_si1@gmail.com',
                'password' => Hash::make('123456'),
                'role' => 3,
                'created_at' => now(),
                'updated_at' => now(),
                'Major_id' => 'FTRC-003',
            ],
            [
                'id' => '3006',
                'email' => 'mo_si2@gmail.com',
                'password' => Hash::make('123456'),
                'role' => 3,
                'created_at' => now(),
                'updated_at' => now(),
                'Major_id' => 'FTRC-003',
            ],
        ];

        $mos = [
            [
                'id' => 'MO3001',
                'full_name' => 'Michael Brown',
                'user_id' => '3001',
            ],
            [
                'id' => 'MO3002',
                'full_name' => 'Sarah Davis',
                'user_id' => '3002',
            ],
            [
                'id' => 'MO3003',
                'full_name' => 'David Wilson',
                'user_id' => '3003',
            ],
            [
                'id' => 'MO3004',
                'full_name' => 'Emily Clark',
                'user_id' => '3004',
            ],
            [
                'id' => 'MO3005',
                'full_name' => 'James Lewis',
                'user_id' => '3005',
            ],
            [
                'id' => 'MO3006',
                'full_name' => 'Laura Harris',
                'user_id' => '3006',
            ],
        ];

        foreach ($users as $userData) {
            User::create($userData);
        }

        foreach ($mos as $moData) {
            MO::create($moData);
        }
    }
}
