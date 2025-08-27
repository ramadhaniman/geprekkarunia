<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function create()
    {
        return view('login'); 
    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $email = $request->email;
        $password = $request->password;

        if ($email === 'admin@karunia.com' && $password === 'admin123') {
            return redirect('/dashboard');
        }

        $user = User::where('email', $request->email)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            
            return back()->with('success', 'login berhasil, data ada di database');
            // return view('dashboardadmin');
        } else {
            
            return back()->with('error', 'kamu siapa? Daftar dulu ya :)');
        }
    }
}
