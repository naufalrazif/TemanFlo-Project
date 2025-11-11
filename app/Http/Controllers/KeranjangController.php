<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Keranjang;
use App\Models\item_keranjang;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


class KeranjangController extends Controller
{
    public function tambah(Request $request)
    {
        $validated = $request->validate([
            'produk_id' => 'required|exists:produks,id',
            'jumlah' => 'required|integer|min:1',
        ]);

        // Cari keranjang milik user login
        $keranjang = Keranjang::firstOrCreate([
            'user_id' => Auth::id(),
        ]);

        // Cek apakah produk sudah ada di keranjang
        $item = item_keranjang::where('keranjang_id', $keranjang->id)
            ->where('produk_id', $validated['produk_id'])
            ->first();

        if ($item) {
            // Jika sudah ada, tambahkan jumlahnya
            $item->jumlah += $validated['jumlah'];
            $item->save();
        } else {
            // Jika belum, buat baru
            item_keranjang::create([
                'keranjang_id' => $keranjang->id,
                'produk_id' => $validated['produk_id'],
                'jumlah' => $validated['jumlah'],
            ]);
        }

        return back()->with('success', 'Produk ditambahkan ke keranjang!');
    }

    public function index()
    {
        $keranjang = Keranjang::with('itemKeranjang.produk')
            ->where('user_id', Auth::id())
            ->first();

            if ($keranjang) {
        foreach ($keranjang->itemKeranjang as $item) {
            $produk = $item->produk;
            if ($produk) {
                // pakai kode kamu di sini 👇
                $produk->foto_url = $produk->foto ? Storage::url($produk->foto) : null;
            }
        }
    }
        return inertia('Keranjang', [
            'keranjang' => $keranjang,
        ]);
    }
}
