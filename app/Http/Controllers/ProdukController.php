<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use Inertia\Inertia;
use Illuminate\Support\Facades\Storage;

class ProdukController extends Controller
{
    public function index() {
        $produks = Produk::all()->map(function ($produk) {
            $produk->foto_url = $produk->foto ? Storage::url($produk->foto) : null;
            return $produk;
        });

        return Inertia::render('Produk/Index', ['produks' => $produks]);
    }

    public function bunga()
    {
        $produks = Produk::where('jenis_buket', 'buket_bunga')
            ->get()
            ->map(function ($produk) {
                $produk->foto_url = $produk->foto ? Storage::url($produk->foto) : null;
                return $produk;
            });

        return Inertia::render('Produk/AllBunga', [
            'produks' => $produks
        ]);
    }

    public function snack() {
    $produks = Produk::where('jenis_buket', 'buket_snack')
        ->get()
        ->map(function ($produk) {
            $produk->foto_url = $produk->foto ? Storage::url($produk->foto) : null;
            return $produk;
        });

    return Inertia::render('Produk/AllSnack', [
        'produks' => $produks
    ]);
}

    public function boneka() {
    $produks = Produk::where('jenis_buket', 'buket_boneka')
        ->get()
        ->map(function ($produk) {
            $produk->foto_url = $produk->foto ? Storage::url($produk->foto) : null;
            return $produk;
        });
        return Inertia::render('ProductPage', [
        'title' => 'All Product Buket Boneka',
        'products' => $produks,
    ]);
}

    public function uang() {
    $produks = Produk::where('jenis_buket', 'buket_uang')
        ->get()
        ->map(function ($produk) {
            $produk->foto_url = $produk->foto ? Storage::url($produk->foto) : null;
            return $produk;
        });

    return Inertia::render('Produk/AllUang', [
        'produks' => $produks
    ]);
}




    public function show($id) {
        $produk = Produk::findOrFail($id);
        return Inertia::render('Produk/Show', ['produk' => $produk]);
    }

    public function create() {
        return Inertia::render('Produk/Create');
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'nama' => 'required|string|max:50',
            'jenis_buket' => 'required|string|max:255',
            'tema' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'harga' => 'required|numeric',
            'foto' => 'required|image|max:2048',
        ]);

        // Simpan file foto ke storage
        if ($request->hasFile('foto')) {
            $path = $request->file('foto')->store('foto', 'public');
            $validated['foto'] = $path;
        }

        // Simpan data produk ke database
        Produk::create($validated);

        return redirect()->route('produk.index')->with('success', 'Produk berhasil ditambahkan.');
    }

    public function edit($id) {
        $produk = Produk::findOrFail($id);
        $produk->foto_url = $produk->foto ? Storage::url($produk->foto) : null; 
        return Inertia::render('Produk/Edit', ['produk' => $produk]);
    }

    public function update(Request $request, $id) {
        $validated = $request->validate([
            'nama' => 'required|string|max:50',
            'jenis_buket' => 'required|in:buket_bunga,buket_snack,buket_boneka,buket_uang',
            'tema' => 'required|in:birthday,graduation,wedding',
            'deskripsi' => 'required|string',
            'harga' => 'required|numeric',
            'foto' => 'nullable|image|max:2048',
        ]);

        $produk = Produk::findOrFail($id);

        // Jika upload foto baru, hapus foto lama dan simpan yang baru
        if ($request->hasFile('foto')) {
            if ($produk->foto) {
                Storage::disk('public')->delete($produk->foto);
            }
            $path = $request->file('foto')->store('foto', 'public');
            $validated['foto'] = $path;
        }

        $produk->update($validated);

        return redirect()->route('produk.index')->with('success', 'Produk berhasil diperbarui.');
    }

    public function destroy($id) {
        $produk = Produk::findOrFail($id);

        if ($produk->foto) {
            Storage::disk('public')->delete($produk->foto);
        }

        $produk->delete();
        return redirect()->route('produk.index')->with('success', 'Produk berhasil dihapus.');
    }
}
