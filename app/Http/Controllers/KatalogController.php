<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;

class KatalogController extends Controller
{
    public function index()
    {
        return view('katalog.index');
    }

    public function products(Request $request)
    {
        $query = Produk::query();

        if ($category = $request->query('category')) {
            // Filter berdasarkan kolom 'jenis_buket'
            $query->where('jenis_buket', $category);
        }

        $products = $query->get()->map(function ($produk) {
            return [
                'id' => $produk->id,
                'name' => $produk->nama,
                'price' => (int) $produk->harga,
                'description' => $produk->deskripsi,
                'image_url' => $produk->foto ? asset('storage/' . $produk->foto) : null,
                'category' => $produk->jenis_buket, // ambil dari kolom ini
            ];
        })->values();

        return response()->json($products->all());
    }

    public function categories()
    {
        // Ambil daftar unik dari kolom 'jenis_buket'
        $categories = Produk::whereNotNull('jenis_buket')
                            ->distinct()
                            ->pluck('jenis_buket')
                            ->filter()
                            ->map(function ($name, $index) {
                                return [
                                    'id' => $index + 1,
                                    'name' => $name
                                ];
                            })
                            ->values();

        return response()->json($categories);
    }
}