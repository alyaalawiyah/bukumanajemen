<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\Buku;
use App\Models\User;

class BukuSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'Admin Perpustakaan',
            'email' => 'admin@perpus.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password123'),
            'remember_token' => Str::random(10),
            'created_at' => now(),
            'updated_at' => now(),

        ]);

        User::create([
            'name' => 'Admin Perpustakaan',
            'email' => 'admin@perpus.com',
            'password' => bcrypt('password123')
        ]);
    }   
}
