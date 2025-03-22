<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'id' => '1001',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('123456'),
            'role' => 1,
            'created_at' => now(),
            'updated_at' => now(),
            'Major_id' => null,
        ]);
    }
}
