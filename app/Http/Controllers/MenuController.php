<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function show($id)
    {
        $menu = Menu::with(['toko.ratings.user', 'ratings.user'])->findOrFail($id);

        return view('pembeli.detail', compact('menu'));
    }
}