<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Toko;

class AdminController extends Controller
{
    public function dashboard()
    {
        $tokos = Toko::all();
        return view('admin-beranda', compact('tokos'));
    }

    public function createToko()
    {
        $users = \App\Models\User::where('role', 'penjual')->get();
        return view('tambah-toko-admin', compact('users'));
    }

    public function storeToko(Request $request)
    {
        $request->validate([
            'nama_toko' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'lokasi'    => 'required|string',
            'jam_buka'  => 'required',
            'jam_tutup' => 'required',
            'user_id'   => 'required|exists:users,id',
        ]);

        Toko::create([
            'user_id'   => $request->user_id,
            'nama_toko' => $request->nama_toko,
            'deskripsi' => $request->deskripsi,
            'lokasi'    => $request->lokasi,
            'jam_buka'  => $request->jam_buka,
            'jam_tutup' => $request->jam_tutup,
        ]);

        return redirect()->route('admin-beranda')->with('success', 'Toko berhasil ditambahkan!');
    }

    public function deleteToko($id)
    {
        $toko = Toko::findOrFail($id);
        $toko->delete();

        return redirect()->route('admin-beranda')->with('success', 'Toko berhasil dihapus!');
    }    

    public function profil()
    {
        $user = Auth::user();
        return view('profile', compact('user'));
    }

    public function editProfil()
    {
        $user = Auth::user();
        return view('ubah-profil-admin', compact('user'));
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

        return redirect()->route('profile')->with('success', 'Profil berhasil diperbarui!');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }
}