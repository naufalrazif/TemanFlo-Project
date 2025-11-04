<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Inertia\Inertia;
use Illuminate\Support\Facades\Storage;

class LihatController extends Controller
{
    public function index()
    {
        $produks = Produk::all()->map(function ($produk) {
            // Tambahkan URL gambar agar bisa diakses di Vue
            $produk->foto_url = $produk->foto ? Storage::url($produk->foto) : null;
            return $produk;
        });

        return Inertia::render('Home', ['produks' => $produks]);
    }
}
