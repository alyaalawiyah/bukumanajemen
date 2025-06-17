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

        return view('beranda');
    }

    public function create()
    {
        return view('auth.create');
    }
}