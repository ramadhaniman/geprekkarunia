<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; // pakai model User bawaan Laravel
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function create()
    {
        return view('register'); // arahkan ke file register.blade.php
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
        ]);

        // Simpan ke database
        User::create([
            'name' => $request->nama,
            'email' => $request->email,
            'password' => Hash::make($request->password), // jangan lupa di-hash
        ]);

        return redirect('/login')->with('success', 'Registrasi berhasil, silakan login.');
    }
}
