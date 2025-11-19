<?php

namespace App\Http\Controllers;
use Inertia\Inertia;
use App\Models\Produk;
use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;

class NavbarController extends Controller
{
    public function katalog(){
         
        // Ambil semua produk dari database
        $produks = Produk::all()->map(function ($produk) {
            // Ubah path foto menjadi URL agar bisa ditampilkan di Vue
            $produk->foto_url = $produk->foto ? Storage::url($produk->foto) : null;
            return $produk;
        });

        // Kirim data ke Katalog.vue
        return Inertia::render('AllBunga', [
            'produks' => $produks,
        ]);
    }

    public function about(){
        return inertia('About');
    }
    
}
