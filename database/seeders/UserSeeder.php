<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create(['name' => 'admin', 'email' => 'admin@gmail.com', 'status' => 'active', 'role' => 'admin', 'password' => 'admin']);
        User::create(['name' => 'pemilik', 'email' => 'pemilik@gmail.com', 'status' => 'active', 'role' => 'pemilik', 'password' => 'pemilik']);
        User::create(['name' => 'penyewa', 'email' => 'penyewa@gmail.com', 'status' => 'active', 'role' => 'penyewa', 'password' =>'penyewa']);
    }
}
