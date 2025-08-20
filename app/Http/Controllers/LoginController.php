<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function create()
    {
        return view('login'); // file login.blade.php
    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            // login berhasil
            return back()->with('success', 'login berhasil, data ada di database');
        } else {
            // login gagal
            return back()->with('error', 'kamu siapa? Daftar dulu ya :)');
        }
    }
}
