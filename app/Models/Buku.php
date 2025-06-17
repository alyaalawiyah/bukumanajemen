<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    // protected $table = 'tb_bukus';
    protected $fillable = ['judul','penulis', 'tahun_terbit', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function kategori()
    {
        return $this->belongsTo(KategoriBuku::class, 'kategori_buku_id');
    }
}
