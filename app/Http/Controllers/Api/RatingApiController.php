<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Rating;
use App\Models\Pesanan;

class RatingApiController extends Controller
{
    public function index($toko_id)
    {
        $ratings = Rating::with('user')
            ->where('toko_id', $toko_id)
            ->latest()
            ->get()
            ->map(fn($r) => [
                'rating_id'  => $r->rating_id,
                'nilai'      => $r->nilai,
                'ulasan'     => $r->ulasan,
                'tanggal'    => $r->tanggal,
                'pemberi'    => $r->user?->name,
                'pesanan_id' => $r->pesanan_id,
            ]);

        return response()->json([
            'success' => true,
            'data'    => $ratings,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'pesanan_id' => 'required|exists:pesanan,pesanan_id',
            'toko_id'    => 'required|exists:toko,toko_id',
            'nilai'      => 'required|integer|min:1|max:5',
            'ulasan'     => 'nullable|string|max:500',
        ]);

        $pesanan = Pesanan::where('pesanan_id', $request->pesanan_id)
            ->where('user_id', Auth::id())
            ->first();

        if (!$pesanan) {
            return response()->json([
                'success' => false,
                'message' => 'Pesanan tidak ditemukan atau bukan milik Anda.',
            ], 403);
        }

        $sudahRating = Rating::where('pesanan_id', $request->pesanan_id)->exists();
        if ($sudahRating) {
            return response()->json([
                'success' => false,
                'message' => 'Pesanan ini sudah diberi rating.',
            ], 422);
        }

        $rating = Rating::create([
            'pesanan_id' => $request->pesanan_id,
            'user_id'    => Auth::id(),
            'toko_id'    => $request->toko_id,
            'nilai'      => $request->nilai,
            'ulasan'     => $request->ulasan ?? 'Tidak ada ulasan teks.',
            'tanggal'    => now(),
        ]);

        $pesanan->update(['status' => 'Selesai']);

        return response()->json([
            'success' => true,
            'message' => 'Rating berhasil disimpan.',
            'data' => [
                'rating_id'  => $rating->rating_id,
                'pesanan_id' => $rating->pesanan_id,
                'nilai'      => $rating->nilai,
                'ulasan'     => $rating->ulasan,
                'tanggal'    => $rating->tanggal,
            ],
        ], 201);
    }
}