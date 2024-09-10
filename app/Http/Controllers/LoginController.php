<?php
// app/Http/Controllers/LoginController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login'); // Pastikan view login ada di resources/views/auth/login.blade.php
    }

    public function login(Request $request)
    {
        // Validasi input
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // Proses login
        if (Auth::attempt($credentials)) {
            // Regenerate session untuk menghindari session fixation
            $request->session()->regenerate();

            // Flash pesan sukses login
            session()->flash('login_success', 'Selamat datang di dashboard!'); //Terhubung ke dashboard.blade.php

            // Redirect ke dashboard
            return redirect()->intended('dashboard');
        }
        // Jika login gagal
        return back()->withErrors([
            'email' => 'Email atau Password salah.',
        ]);
    }

    public function logout(Request $request)
    {
        // Proses logout
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Flash pesan sukses logout
        session()->flash('logout_success', 'Anda telah berhasil logout!'); //Terhubung ke login.blade dan dropdown-pofile.blade

        // Redirect ke halaman login
        return redirect('/login');
    }
}
