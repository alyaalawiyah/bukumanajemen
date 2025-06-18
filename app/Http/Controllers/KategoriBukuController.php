<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\KategoriBuku;
use App\Models\Buku;


class KategoriBukuController extends Controller
{
    public function index()
    {
        $kategori_buku = KategoriBuku::all(); // Ambil semua data kategori dari database
        return view('kategori_buku.index', compact('kategori_buku'));

        $kategori_buku = KategoriBuku::where('user_id', Auth::id())->get();
        return view('users.create', compact('kategori_buku'));
    }

    // public function create()
    // {
    //     return view('kategori_buku.create');
    // }

    public function store(Request $request)
    {
        $request->validate([
            'nama_kategori' => 'required|string|max:255|unique:kategori_buku,nama_kategori',
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('buku.index')->with('success', 'Buku berhasil ditambahkan');
    }

    public function tampilanBukuKategori($id)
    {
        $buku = Buku::where('kategori_buku_id', $id)->get();
        return view('kategori_buku.buku', compact('buku'));
    }

}
