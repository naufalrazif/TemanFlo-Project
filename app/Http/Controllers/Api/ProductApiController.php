<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Produk;
use Illuminate\Support\Facades\Storage;

class ProductApiController extends Controller
{
    
    
    
    public function index(Request $request)
{
    $query = Produk::query();

    if ($request->filled('jenis_buket')) {
        $query->where('jenis_buket', $request->jenis_buket);
    }

    $products = $query->get()->map(function ($produk) {
        $produk->foto_url = $produk->foto
            ? url('/api/image/' . $produk->foto)
            : null;
        return $produk;
    });

    return response()->json([
        'message' => 'Daftar produk berhasil diambil',
        'data' => $products
    ]);
}
    
    
    
    public function show($id)
{
    $produk = Produk::find($id);

    if (!$produk) {
        return response()->json(['message' => 'Produk tidak ditemukan'], 404);
    }

    
    $produk->foto_url = $produk->foto
        ? url('/api/image/' . $produk->foto)
        : null;

    return response()->json([
        'message' => 'Detail produk berhasil diambil',
        'data' => $produk
    ]);
}
    
    
    
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'jenis_buket' => 'required|string|max:100',
            'harga' => 'required|numeric|min:0',
            'tema' => 'nullable|string|max:100',
            'deskripsi' => 'nullable|string',
            'size' => 'nullable|string|max:10',
            'foto' => 'nullable|file|mimes:jpg,jpeg,png|max:2048',
        ]);

        
        if ($request->hasFile('foto')) {
           $validated['foto'] = $request->file('foto')->store('foto', 'public');
        }

        $produk = Produk::create($validated);

        return response()->json([
            'message' => 'Produk berhasil ditambahkan',
            'data' => $produk
        ], 201);
    }

    
    
    
    public function update(Request $request, $id)
    {
        $produk = Produk::find($id);

        if (!$produk) {
            return response()->json(['message' => 'Produk tidak ditemukan'], 404);
        }

        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'jenis_buket' => 'required|string|max:100',
            'harga' => 'required|numeric|min:0',
            'tema' => 'nullable|string|max:100',
            'deskripsi' => 'nullable|string',
            'size' => 'nullable|string|max:10',
            'foto' => 'nullable|file|mimes:jpg,jpeg,png|max:2048',
        ]);

        
        if ($request->hasFile('foto')) {

            
            if ($produk->foto && Storage::disk('public')->exists($produk->foto)) {
                Storage::disk('public')->delete($produk->foto);
            }

            
            $validated['foto'] = $request->file('foto')->store('foto', 'public');
        }

        $produk->update($validated);

        return response()->json([
            'message' => 'Produk berhasil diupdate',
            'data' => $produk
        ]);
    }

    
    
    
    public function destroy($id)
    {
        $produk = Produk::find($id);

        if (!$produk) {
            return response()->json(['message' => 'Produk tidak ditemukan'], 404);
        }

        
        if ($produk->foto && Storage::disk('public')->exists($produk->foto)) {
            Storage::disk('public')->delete($produk->foto);
        }

        $produk->delete();

        return response()->json(['message' => 'Produk berhasil dihapus']);
    }
}
