<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KategoriBuku;

class KategoriBukuController extends Controller
{
    public function index()
    {
        $kategori_buku = KategoriBuku::all(); // Ambil semua data kategori dari database
        return view('kategori_buku.index', compact('kategori_buku'));
    }
}
