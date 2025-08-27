<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; 
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function create()
    {
        return view('register');
    }

    public function store(Request $request)
    {
        
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
        ]);

        
        User::create([
            'name' => $request->nama,
            'email' => $request->email,
            'password' => Hash::make($request->password), 
        ]);

        return redirect('/login')->with('success', 'Registrasi berhasil, silakan login.');
    }
}
