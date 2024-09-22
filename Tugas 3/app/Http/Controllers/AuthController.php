<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Menampilkan form login
    public function showLoginForm()
    {
        return view('login'); // Pastikan ini merujuk pada view login Anda
    }

    // Menangani proses login
    public function login(Request $request)
    {
        // Validasi input
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Coba autentikasi
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            // Redirect berdasarkan role
            $user = Auth::user();
            return redirect()->route('home'); // Semua pengguna diarahkan ke home
        }

        // Jika gagal, kembali ke halaman login
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    // Menangani proses logout
    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/login'); // Arahkan ke halaman login setelah logout
    }
}
