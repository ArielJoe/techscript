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
        User::create([
            'id' => '4001',
            'email' => 'kaprodi@gmail.com',
            'password' => Hash::make('123456'),
            'role' => 'Kaprodi',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
