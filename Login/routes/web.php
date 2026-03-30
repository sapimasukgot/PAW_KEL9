<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('login'); 
});
Route::get('/login', function () {
    return view('login'); 
})->name('login');
Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
Route::post('/login', function () {
    return redirect()->route('dashboard'); 
});
Route::post('/login', function () {
    return redirect()->route('dashboard'); 
})->name('register');



Route::post('/login', function () {
    return "Ini halaman proses cek email dan password (Login)";
});

Route::post('/register', function () {
    return "Ini halaman proses pendaftaran akun baru (Register)";
})->name('register');

Route::post('/login', function () {
    return redirect()->route('dashboard'); 
});

Route::get('/lupa-password', function () {
    return "Ini halaman form lupa password";
})->name('password.request');

Route::get('/admin-beranda', function () {
    return view('admin-beranda');
})->name('admin-beranda');