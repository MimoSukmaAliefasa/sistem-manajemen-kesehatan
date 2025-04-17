<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function register()
    {
        return view('auth.register');
    }
    public function logout(Request $request)
    {
        auth()->logout();
        return redirect('/login')->with('success', 'Logout berhasil');
    }
    public function postLogin(Request $request)
    {
        $credentials = $request->only('email', 'password');

    if (auth()->attempt($credentials)) {
        $request->session()->regenerate();

        // Ambil role dari user yang login
        $role = auth()->user()->role;

        // Redirect sesuai role
        return match ($role) {
            'dokter' => redirect('/dokter')->with('success', 'Login sebagai Dokter'),
            'pasien' => redirect('/pasien')->with('success', 'Login sebagai Pasien'),
            default => redirect('/')->with('success', 'Login berhasil'),
        };
    }

    return redirect('/login')->with('error', 'Email atau password salah');
    }

    public function postRegister(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|in:dokter,pasien', // Validasi role
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->role = $request->role; // Simpan role
        $user->save();

        // Auto login setelah register
        auth()->login($user);

        // Redirect sesuai role
        return match ($user->role) {
            'dokter' => redirect('/dokter')->with('success', 'Registrasi berhasil sebagai Dokter'),
            'pasien' => redirect('/pasien')->with('success', 'Registrasi berhasil sebagai Pasien'),
            default => redirect('/')->with('success', 'Registrasi berhasil'),
        };
    }
}
