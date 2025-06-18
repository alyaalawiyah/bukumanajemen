<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Buku;
use App\Models\User;
use App\Models\KategoriBuku;

class BukuSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::where('email', 'admin@perpus.com')->first();

        Buku::create([
            'judul' => 'Learning Java Script',
            'penulis' => 'Dina',
            'tahun_terbit' => '2019',
            'kategori_buku_id' => '2',
            'user_id' => $user->id,
        ]);

        Buku::create([
            'judul' => 'PHP Dasar',
            'penulis' => 'Ilham',
            'tahun_terbit' => '2019',
            'kategori_buku_id' => '2',
            'user_id' => $user->id,
        ]);
    }   
}
