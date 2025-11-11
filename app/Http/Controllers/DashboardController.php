<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Inertia\Inertia;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Route;


class DashboardController extends Controller
{
    public function index()
    {
        $produks = Produk::all()->map(function ($produk) {
            // Tambahkan URL gambar agar bisa diakses di Vue
            $produk->foto_url = $produk->foto ? Storage::url($produk->foto) : null;
            return $produk;
        });
        
        return Inertia::render('Home', [
            'produks' => $produks,
            'canLogin' => Route::has('login'),
            'canRegister' => Route::has('register'),
            
        ]);   
     }

    public function show($id)
    {
        $produk = Produk::findOrFail($id);

        // Tambahkan foto_url supaya bisa diakses di frontend
        $produk->foto_url = $produk->foto ? Storage::url($produk->foto) : null;

        return Inertia::render('DetailProduk', [
            'produk' => $produk
        ]);
    }

    
}