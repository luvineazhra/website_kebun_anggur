<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin Kebun Anggur',
            'email' => 'admin@kebun-anggur.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
            'phone' => '021-12345678',
            'address' => 'Jl. Kebun Anggur No. 1, Jakarta Pusat',
        ]);
    }
}