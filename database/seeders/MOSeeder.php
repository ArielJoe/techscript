<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class MOSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'id' => '3001',
            'email' => 'mo@gmail.com',
            'password' => Hash::make('123456'),
            'role' => 'MO',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
