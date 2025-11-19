<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Keranjang;
use App\Models\item_keranjang;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;


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

    public function update(Request $request)
    {
        $validated = $request->validate([
            'item_id' => 'required|exists:item_keranjangs,id',
            'jumlah' => 'required|integer|min:1',
        ]);

        $item = item_keranjang::findOrFail($validated['item_id']);
        
        // Pastikan item milik user yang sedang login
        if ($item->keranjang->user_id !== Auth::id()) {
            abort(403, 'Unauthorized');
        }

        // Update jumlah
        $item->jumlah = $validated['jumlah'];
        $item->save();

        return back()->with('success', 'Jumlah berhasil diupdate');
    }

    public function destroy($id)
    {
        $item = item_keranjang::findOrFail($id);

        if ($item->keranjang->user_id !== Auth::id()) {
            abort(403);
        }

        $item->delete();

        return back()->with('success', 'Item berhasil dihapus');
    }

     public function checkout()
    {
        $userId = Auth::id();

        // Ambil keranjang user lengkap dengan produk
        $keranjang = Keranjang::with(['itemKeranjang.produk'])
            ->where('user_id', $userId)
            ->first();

        // Jika keranjang kosong
        if (!$keranjang || $keranjang->itemKeranjang->count() == 0) {
            return redirect()->route('keranjang.index')
                ->with('error', 'Keranjang kosong.');
        }

         // Tambahkan foto_url manual
        foreach ($keranjang->itemKeranjang as $item) {
            if ($item->produk) {
                $item->produk->foto_url = $item->produk->foto
                    ? Storage::url($item->produk->foto)
                    : null;
            }
        }

        return inertia('Payment', [
            'items' => $keranjang->itemKeranjang,   // ambil dari database
        ]);
    }

}
