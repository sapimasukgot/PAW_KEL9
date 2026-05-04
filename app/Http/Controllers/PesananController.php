<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PesananController extends Controller
{
    public function updateProfile(Request $request)
{
    $user = \Illuminate\Support\Facades\Auth::user();

    $request->validate([
        'nama' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users,email,' . $user->user_id . ',user_id',
    ]);

    $user->update([
        'nama' => $request->nama,
        'email' => $request->email,
    ]);

    return redirect()->route('pembeli-profil')->with('success', 'Profil berhasil diperbarui!');
}
}
