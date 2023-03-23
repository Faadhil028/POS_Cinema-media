<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([
                'name' => 'admin',
                'email' => 'admin@email.com',
                'email_verified_at' => now(),
                'password' => bcrypt('password'),
        ]);
        $user->assignRole('admin');
    }
}
