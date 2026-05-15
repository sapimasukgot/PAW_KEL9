<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class PenjualController extends Controller
{
    public function profil()
    {
        $user = Auth::user();
        return view('profil-penjual', compact('user'));
    }

    public function editProfil()
    {
        $user = Auth::user();
        return view('ubah-profil', compact('user'));
    }

    public function updateProfil(Request $request)
    {
        $user = User::find(Auth::id());

        $request->validate([
            'name'  => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . Auth::id(),
        ]);

        $user->name  = $request->name;
        $user->email = $request->email;
        $user->save();

        Auth::setUser($user->fresh());

        return redirect()->route('profil-penjual')->with('success', 'Profil berhasil diperbarui!');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }
}