<?php

namespace App\Http\Controllers;
use App\Models\Produk;
use Illuminate\Http\Request;

class NavbarController extends Controller
{
    // Halaman Home
    public function Home()
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

    // Halaman Katalog / All Bunga
    public function allBunga()
    {
        $produks = [
            [
                'id' => 1,
                'nama' => 'Buket Mawar Merah',
                'jenis_buket' => 'buket_bunga',
                'tema' => 'Romantis',
                'harga' => 150000,
                'deskripsi' => 'Buket mawar merah segar untuk pasangan tercinta.',
                'foto_url' => asset('assets/bunga1.jpg')
            ],
            [
                'id' => 2,
                'nama' => 'Buket Lily Putih',
                'jenis_buket' => 'buket_bunga',
                'tema' => 'Elegan',
                'harga' => 200000,
                'deskripsi' => 'Buket lily putih yang anggun dan menawan.',
                'foto_url' => asset('assets/bunga2.jpg')
            ],
            // Tambahkan produk lain sesuai kebutuhan
        ];

        return inertia('AllBunga', [
            'produks' => $produks
        ]);
    }

    // Halaman About Us
    public function about()
    {
        return inertia('About'); // pastikan ada About.vue di resources/js/Pages
    }
}
