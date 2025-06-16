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

    public function create()
    {
        return view('kategoribuku.create');
    }

    public function store(Request $request)
    {
        // validasi data yang diterima
        $request->validate([
            'name' => 'requiered|string|max:255|unique:kategori_buku,nama_kategori',
        ]);
        // buuat kategori buku baru
        KategoriBuku::create([
            'nama_kategori' => $request->input('nama_kategori'),
        ]);

        return redirect()->route('kategoribuku.index')->with('success', 'kategori buku berhasil ditambahkan.');
    }

    public function tampilanBukuKategori($id)
    {
        $buku = Buku::where('kategori_buku_id', $id)->get();
        return view('kategori_buku.buku', compact(''))
    }
}
