<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use Inertia\Inertia;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ProdukController extends Controller
{
    /**
     * Index – tampilkan semua produk
     */
    public function index()
    {
        $produks = Produk::latest()->get()->map(function ($produk) {
            $produk->foto_url = $produk->foto ? Storage::url($produk->foto) : null;
            return $produk;
        });

        return Inertia::render('Produk/Index', [
            'produks' => $produks
        ]);
    }

    /**
     * Create – tampilkan form tambah produk
     */
    public function create()
    {
        return Inertia::render('Produk/Create');
    }

    /**
     * Store – simpan produk baru
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'nama'         => 'required|string|max:50',
            'jenis_buket'  => 'required|string|max:255',
            'tema'         => 'required|string|max:255',
            'deskripsi'    => 'required|string',
            'size'         => 'nullable|string|max:100',
            'harga'        => 'required|numeric',
            'foto'         => 'required|image|mimes:jpeg,jpg,png|max:2048',
        ]);

        // upload foto
        if ($request->hasFile('foto')) {
            $validated['foto'] = $request->file('foto')->store('foto', 'public');
        }

        Produk::create($validated);

        return redirect()
            ->route('produk.index')
            ->with('success', 'Produk berhasil ditambahkan!');
    }

    /**
     * Show – tampilkan detail produk
     */
    public function show($id)
    {
        $produk = Produk::findOrFail($id);
        $produk->foto_url = $produk->foto ? Storage::url($produk->foto) : null;

        return Inertia::render('Produk/Show', [
            'produk' => $produk
        ]);
    }

    /**
     * Edit – tampilkan form edit produk
     */
    public function edit($id)
    {
        $produk = Produk::findOrFail($id);
        $produk->foto_url = $produk->foto ? Storage::url($produk->foto) : null;

        return Inertia::render('Produk/Edit', [
            'produk' => $produk
        ]);
    }

    /**
     * Update – simpan perubahan produk
     */
    public function update(Request $request, $id): RedirectResponse
    {
        $validated = $request->validate([
            'nama'         => 'required|string|max:50',
            'jenis_buket'  => 'required|in:buket_bunga,buket_snack,buket_boneka,buket_uang',
            'tema'         => 'required|in:birthday,graduation,wedding',
            'deskripsi'    => 'required|string',
            'size'         => 'nullable|string|max:100',
            'harga'        => 'required|numeric',
            'foto'         => 'nullable|image|mimes:jpeg,jpg,png|max:2048',
        ]);

        $produk = Produk::findOrFail($id);

        // Data untuk update
        $updateData = [
            'nama'         => $validated['nama'],
            'jenis_buket'  => $validated['jenis_buket'],
            'tema'         => $validated['tema'],
            'deskripsi'    => $validated['deskripsi'],
            'size'         => $validated['size'],
            'harga'        => $validated['harga'],
        ];

        // Jika upload foto baru
        if ($request->hasFile('foto')) {

            // hapus foto lama
            if ($produk->foto) {
                Storage::disk('public')->delete($produk->foto);
            }

            // upload foto baru
            $updateData['foto'] = $request->file('foto')->store('foto', 'public');
        }

        $produk->update($updateData);

        return redirect()
            ->route('produk.index')
            ->with('success', 'Produk berhasil diperbarui!');
    }

    /**
     * Destroy – hapus produk
     */
    public function destroy($id): RedirectResponse
    {
        $produk = Produk::findOrFail($id);

        // hapus foto jika ada
        if ($produk->foto) {
            Storage::disk('public')->delete($produk->foto);
        }

        $produk->delete();

        return redirect()
            ->route('produk.index')
            ->with('success', 'Produk berhasil dihapus!');
    }
}
