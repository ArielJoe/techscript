<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class KaprodiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'id' => '2001',
                'email' => 'kaprodi_ik@gmail.com',
                'password' => Hash::make('123456'),
                'role' => 2,
                'created_at' => now(),
                'updated_at' => now(),
                'Major_id' => 1,
            ],
            [
                'id' => '2002',
                'email' => 'kaprodi_ti@gmail.com',
                'password' => Hash::make('123456'),
                'role' => 2,
                'created_at' => now(),
                'updated_at' => now(),
                'Major_id' => 2,
            ],
            [
                'id' => '2003',
                'email' => 'kaprodi_si@gmail.com',
                'password' => Hash::make('123456'),
                'role' => 2,
                'created_at' => now(),
                'updated_at' => now(),
                'Major_id' => 3,
            ],
        ];

        foreach ($users as $userData) {
            User::create($userData);
        }
    }
}
