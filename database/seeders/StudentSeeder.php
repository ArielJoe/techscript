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
        User::create([
            'id' => '2001',
            'email' => 'student@gmail.com',
            'password' => Hash::make('123456'),
            'role' => 'Student',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
