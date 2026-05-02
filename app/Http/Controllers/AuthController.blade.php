<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLogin() {
        return view('login'); 
    }

    public function login(Request $request) {
        $credentials = $request->validate([
            'name'     => 'required|string', 
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        $authData = [
            'email'    => $credentials['email'],
            'password' => $credentials['password']
        ];

        if (Auth::attempt($authData)) {
            $request->session()->regenerate();

            $user = Auth::user();
            return ($user->role) 
                ? redirect()->intended(route($user->role . '-beranda'))
                : redirect()->route('role.pilih');
        }

        return back()->with('error', 'Kredensial tidak cocok dengan data kami.')->withInput();
    }
    public function register(Request $request) {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'pembeli',
        ]);

        return redirect('/login')->with('success', 'Registrasi berhasil!');
    }

    // Logout
    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}