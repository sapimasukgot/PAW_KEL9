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
    $request->validate([
        'email'    => 'required|email',
        'password' => 'required',
    ]);

    $user = User::where('email', $request->email)->first();

    if ($user && Hash::check($request->password, $user->password)) {
        Auth::login($user);
        $request->session()->regenerate();
        if ($user->role === 'admin') {
            return redirect()->route('admin-beranda');
        } elseif ($user->role === 'penjual') {
            return redirect()->route('penjual-beranda');
        } else {
            return redirect()->intended('/pembeli');
        }
    }

    return back()
        ->withErrors(['email' => 'Email atau password salah.'])
        ->withInput($request->only('email'));
}

    public function register(Request $request) {
        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        try {
            $user = User::create([
                'name'     => $request->name,
                'email'    => $request->email,
                'password' => Hash::make($request->password),
                'role'     => 'pembeli', 
            ]);

            Auth::login($user);
            return redirect()->route('pembeli-beranda');

        } catch (\Exception $e) {
            return back()->withInput()->withErrors(['error' => 'Terjadi kesalahan: ' . $e->getMessage()]);
        }
    }

    public function updateRole(Request $request) {
        $request->validate(['role' => 'required|in:pembeli,penjual,admin']);
        $user = Auth::user();
        $user->role = $request->role;
        $user->save();

        if ($user->role === 'pembeli') return redirect()->route('pembeli-beranda');
        if ($user->role === 'penjual') return redirect()->route('penjual-beranda');
        if ($user->role === 'admin')   return redirect()->route('admin-beranda');
    }

    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}