<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use Inertia\Inertia;
use Illuminate\Support\Facades\Storage;

class ProdukController extends Controller
{
    public function index(Request $request) {
    $jenis = $request->query('jenis_buket'); // ambil filter dari query string

    $produks = Produk::when($jenis, function ($q) use ($jenis) {
        $q->where('jenis_buket', $jenis);
    })->get()->map(function ($produk) {
        $produk->foto_url = $produk->foto ? Storage::url($produk->foto) : null;
        return $produk;
    });

    return Inertia::render('LihatProdukAdmin', ['produks' => $produks]);
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
    $produk = Produk::create($validated);

    // Redirect sesuai jenis_buket
    switch ($produk->jenis_buket) {
        case 'bunga':
            return redirect()->route('allbunga')->with('success', 'Produk berhasil ditambahkan.');
        case 'boneka':
            return redirect()->route('allboneka')->with('success', 'Produk berhasil ditambahkan.');
        case 'snack':
            return redirect()->route('allsnack')->with('success', 'Produk berhasil ditambahkan.');
        default:
            return redirect()->route('produk.index')->with('success', 'Produk berhasil ditambahkan.');
    }
}


    public function edit($id) {
        $produk = Produk::findOrFail($id);
        return Inertia::render('Edit', ['produk' => $produk]);
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

    // Halaman AllBunga
public function allBunga() {
    $produks = Produk::where('jenis_buket', 'buket_bunga')
    ->get()
    ->map(function ($produk) {
        $produk->foto_url = $produk->foto ? Storage::url($produk->foto) : null;
        return [
            'name' => $produk->nama,
            'price' => 'Rp ' . number_format($produk->harga, 0, ',', '.'),
            'image' => $produk->foto_url
        ];
    });

return Inertia::render('AllBunga', ['products' => $produks]);
}

// Halaman AllBoneka
public function allBoneka() {
    $produks = Produk::where('jenis_buket', 'buket_boneka')
    ->get()
    ->map(function ($produk) {
        $produk->foto_url = $produk->foto ? Storage::url($produk->foto) : null;
        return [
            'name' => $produk->nama,
            'price' => 'Rp ' . number_format($produk->harga, 0, ',', '.'),
            'image' => $produk->foto_url
        ];
    });

return Inertia::render('AllBoneka', ['products' => $produks]);

}

// Halaman AllSnack
public function allSnack() {
    $produks = Produk::where('jenis_buket', 'buket_snack')
    ->get()
    ->map(function ($produk) {
        $produk->foto_url = $produk->foto ? Storage::url($produk->foto) : null;
        return [
            'name' => $produk->nama,
            'price' => 'Rp ' . number_format($produk->harga, 0, ',', '.'),
            'image' => $produk->foto_url
        ];
    });

return Inertia::render('AllSnack', ['products' => $produks]);

}

}
