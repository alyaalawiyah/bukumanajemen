<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KategoriBuku extends Model
{
    protected $table = 'kategori_buku';

    public function bukus()
    {
        return $this->hasMany(Buku::class, 'kategori_buku_id');
    }
}
