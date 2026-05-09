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

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            $user = Auth::user();

            if ($user->role === 'pembeli') return redirect()->route('pembeli-beranda');
            if ($user->role === 'penjual') return redirect()->route('penjual-beranda');
            if ($user->role === 'admin') return redirect()->route('admin-beranda');
            
            return redirect()->route('role.pilih');
        }

        return back()->with('error', 'Kredensial salah.')->withInput();
    }

    public function register(Request $request) {
        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        try {
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->role = 'user';
            $user->save();

            Auth::login($user);
            return redirect()->route('role.pilih');

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
        if ($user->role === 'admin') return redirect()->route('admin-beranda');
    }

    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}