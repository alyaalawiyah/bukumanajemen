<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buku;
use App\Models\KategoriBuku;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;


class BukuController extends Controller
{
    public function index(Request $request)
    {
        $query = Buku::where('user_id', Auth::id());

        if ($request->has('search') && $request->search != '') {
            $query->where('judul', 'like', '%' . $request->search . '%');
        }

        $books = $query->paginate(5);
        return view('users.index', compact('books'));
        
    }


    public function show($nama)  
    {
        return view('buku.profil', ['nama' => $nama]);
    }

    public function create()
    {
        $kategori_buku = KategoriBuku::all();
        return view('users.create', compact('kategori_buku'));
    }

    public function edit($id)
    {
        $buku = Buku::findOrFail($id);
        return view('users.edit', compact('buku'));
    }

    public function update(Request $request, $id)
    {
    $request->validate([
        'judul' => 'required|string|max:255',
        'penulis' => 'required|string|max:255',
        'tahun_terbit' => 'required|integer',
    ]);

    // Cari Buku
    $buku = Buku::findOrFail($id);

    // Update data
    $buku->update([
        'judul' => $request->judul,
        'penulis' => $request->penulis,
        'tahun_terbit' => $request->tahun_terbit,
    ]);

    return redirect()->route('buku.index')->with('success', 'Data buku berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $buku = Buku::findOrFail($id);
        $buku->delete();

        return redirect()->route('users.index')->with('success', 'Buku berhasil di hapus!');
    }

    public function store(Request $request)
    {
    
    $request->validate([
        'judul' => 'required|string',
        'penulis' => 'required|string',
        'tahun_terbit' => 'required|numeric',
        'kategori_buku_id' => 'required|exists:kategori_buku,id'
    ]);

    Buku::create([
        'judul' => $request->judul,
        'penulis' => $request->penulis,
        'tahun_terbit' => $request->tahun_terbit,
        'kategori_buku_id' => $request->kategori_buku_id,
        'user_id' => Auth::id(),
    ]);

    return redirect()->route('buku.index')->with('success', 'Buku berhasil ditambahkan!');
    }

}

