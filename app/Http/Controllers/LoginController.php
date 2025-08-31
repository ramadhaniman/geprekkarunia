<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

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

        // Admin hardcode login
        if ($request->email === 'admin@karunia.com' && $request->password === 'admin123') {
            // Bisa langsung login pakai Auth::loginUsingId jika admin ada di DB
            $admin = User::where('email', 'admin@karunia.com')->first();
            if ($admin) {
                Auth::login($admin);
            }
            return redirect('/dashboard')->with('success', 'Login sebagai Admin');
        }

        // Cek user dari database
        $user = User::where('email', $request->email)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            Auth::login($user); // <-- INI YANG PENTING
            return redirect('/')->with('success', 'Login berhasil');
        } else {
            return back()->with('error', 'Email atau password salah');
        }
    }

    public function destroy(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login')->with('success', 'Anda sudah logout');
    }
}
