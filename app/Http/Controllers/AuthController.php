<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLoginForm() {
        return view('auth.login');
    }

    public function login(Request $request) {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->intended('/');
        }else{
            return back()->withErrors([
                'email' => 'Email atau Password salah.',
            ])->withInput();
        }
    }

    public function logout() {
        Auth::logout();
        return redirect('/');
    }

    public function showRegisterForm()
    {
        return view('auth.registrasi');
    }

    public function register(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' =>'required|email|unique:users,email',
            'password' => 'required|min:6',
        ]);

        \App\Models\User::create([
            'name' => $request->nama,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        return redirect()->route('login')->with('success', 'Registrasi berhasil. Silakan login.');
    }
}
