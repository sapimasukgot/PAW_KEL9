<?php

namespace App\Http\Controllers;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        if (in_array(Auth::user()->role, $roles)) {
            return $next($request);
        }

        $role = Auth::user()->role;
        if ($role === 'admin') return redirect()->route('admin-beranda');
        if ($role === 'penjual') return redirect()->route('penjual-beranda');
        if ($role === 'pembeli') return redirect()->route('pembeli-beranda');

        return redirect()->route('role.pilih');
    }
}