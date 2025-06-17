<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;


class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('auth.index', compact('users'));

    }

    public function create()
    {
        return view('auth.create');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return view('auth.edit', compact('user'));
        return redirect()->route('auth.index')->with('success', 'pengguna berhasil di hapus');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email'=> 'required|string|email|max:255|unique:users,email,'.$id,
            'password' => 'nullable|min:8'
        ]);
        // cari user berdasrkan id
        $user = User::findOrFail($id);

        $user->name = $request->input('name');
        $user->email =  $request->input('email');

        if ($request->filled('password')) {
            $user->password = bcrypt($request->input('password'));
        }

        $user->save();

        return redirect()->route('auth.index')->with('success', 'data perngguna berhasil di perbarui.');
    }

    public function store(Request $request)
{
    // validasi data yang diterima
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users,email',
        'password' => 'required|string|min:8',
    ]);

    // buat pengguna baru
    User::create([
        'name' => $request->input('name'),
        'email' => $request->input('email'),
        'password' => bcrypt($request->input('password')),
    ]);

    // redirect kembali
    return redirect()->route('auth.index')->with('success', 'pengguna berhasil ditambahkan');
}

}