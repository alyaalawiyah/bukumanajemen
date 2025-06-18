<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KategoriBuku extends Model
{
    protected $table = 'kategori_buku';
    protected $fillable = ['nama_kategori', 'user_id'];

    public function bukus()
    {
        return $this->hasMany(Buku::class, 'kategori_buku_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
