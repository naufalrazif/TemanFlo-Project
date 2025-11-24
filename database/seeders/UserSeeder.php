<?php

namespace Database\Seeders;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Admin
        User::create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
            'no_telp' => '08123456789',
        ]);

        User::create([
            'name' => 'Razif',
            'email' => 'razif@gmail.com',
            'password' => Hash::make('password'),
            'role' => 'customer',
            'no_telp' => '08123456789',
        ]);
        
    }
}
