<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthApiController;
use App\Http\Controllers\Api\MenuApiController;
use App\Http\Controllers\Api\PesananApiController;
use App\Http\Controllers\Api\RatingApiController;
use App\Http\Controllers\Api\UserApiController;
use App\Http\Controllers\Api\TokoApiController;

Route::post('/login',    [AuthApiController::class, 'login']);
Route::post('/register', [AuthApiController::class, 'register']);

Route::get('/menu',       [MenuApiController::class, 'index']);
Route::get('/menu/{id}',  [MenuApiController::class, 'show']);
Route::get('/toko',       [TokoApiController::class, 'index']);
Route::get('/toko/{id}',  [TokoApiController::class, 'show']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthApiController::class, 'logout']);

    Route::get('/user',           [UserApiController::class, 'show']);
    Route::put('/user',           [UserApiController::class, 'update']);
    Route::put('/user/password',  [UserApiController::class, 'updatePassword']);
    Route::delete('/user',        [UserApiController::class, 'destroy']);

    Route::get('/pesanan',         [PesananApiController::class, 'index']);
    Route::post('/pesanan',        [PesananApiController::class, 'store']);
    Route::get('/pesanan/ongoing', [PesananApiController::class, 'ongoing']);
    Route::get('/pesanan/{id}',    [PesananApiController::class, 'show']);

    Route::get('/rating/toko/{toko_id}', [RatingApiController::class, 'index']);
    Route::post('/rating',               [RatingApiController::class, 'store']);
});