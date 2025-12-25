<?php

namespace App\Http\Controllers;

use App\Models\Keranjang;
use App\Models\Pesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class PaymentController extends Controller
{
    /**
     * Generate Snap Token Midtrans saat user klik "Bayar"
     */
    public function token(Request $request)
    {
        // 1. Validasi input wajib
        $request->validate([
            'alamat' => 'required|string',
            'kota' => 'required|string',
        ]);

        // 2. Ambil user yang login
        $user = Auth::user();

        // 3. Ambil keranjang & pastikan tidak kosong
        $keranjang = Keranjang::with('itemKeranjang.produk')
            ->where('user_id', $user->id)
            ->first();

        if (!$keranjang || $keranjang->itemKeranjang->isEmpty()) {
            return back()->with('error', 'Keranjang kosong.');
        }

        // 4. Hitung subtotal
        $subtotal = $keranjang->itemKeranjang->sum(fn($item) => $item->jumlah * $item->produk->harga);

        // 5. Hitung ongkir
        $daerahGratis = ['klaten', 'surakarta', 'solo', 'sukoharjo', 'karanganyar', 'sragen', 'boyolali', 'wonogiri'];
        $kotaInput = strtolower($request->kota);
        $isGratis = collect($daerahGratis)->contains(fn($d) => Str::contains($kotaInput, $d));

        $ongkir = $isGratis ? 0 : 5000;
        $ongkirType = $isGratis ? 'gratis' : 'hemat';
        $total = $subtotal + $ongkir;

        // 6. Buat order_id unik
        $orderId = 'INV-' . strtoupper(uniqid($user->id . '-'));

        // 7. Simpan pesanan utama
        $pesanan = Pesanan::create([
            'order_id' => $orderId,
            'user_id' => $user->id,
            'nama' => $user->name,
            'email' => $user->email,
            'alamat' => $request->alamat,
            'kota' => $request->kota,
            'no_telp' => $user->no_telp ?? '',
            'ongkir' => $ongkir,
            'ongkir_type' => $ongkirType,
            'total' => $total,
            'status_pembayaran' => 'pending',
        ]);

        // 8. Simpan detail pesanan
        foreach ($keranjang->itemKeranjang as $item) {
            $pesanan->detailPesanans()->create([
                'produk_id' => $item->produk_id,
                'jumlah' => $item->jumlah,
                'subtotal' => $item->jumlah * $item->produk->harga,
            ]);
        }

        // 9. Kosongkan keranjang
        $keranjang->itemKeranjang()->delete();

        // 10. Setup Midtrans
        \Midtrans\Config::$serverKey = config('midtrans.server_key');
        \Midtrans\Config::$isProduction = false;
        \Midtrans\Config::$isSanitized = true;
        \Midtrans\Config::$is3ds = true;

        $baseUrl = env('APP_URL', 'http://localhost:8000');

        $payload = [
            'transaction_details' => [
                'order_id' => $orderId,
                'gross_amount' => $total,
            ],
            'customer_details' => [
                'first_name' => $user->name,
                'email' => $user->email,
                'phone' => $user->no_telp ?? '',
            ],
            'callbacks' => [
                'finish' => $baseUrl . '/checkout/finish',
                'error' => $baseUrl . '/checkout/finish',
                'pending' => $baseUrl . '/checkout/finish',
            ],
        ];

        $snapToken = \Midtrans\Snap::getSnapToken($payload);

        // 11. Redirect ke halaman finish dengan token
        return inertia()->location(url('/checkout/finish') . '?snap_token=' . $snapToken . '&order_id=' . $orderId);
    }

    /**
     * Webhook dari Midtrans (harus publik, tanpa auth!)
     */
    public function webhook(Request $request)
    {
        $orderId = $request->order_id;
        $status = $request->transaction_status;

        $pesanan = Pesanan::where('order_id', $orderId)->first();

        if (!$pesanan) {
            return response()->json(['message' => 'Order not found'], 404);
        }

        // Update status berdasarkan notifikasi Midtrans
        if (in_array($status, ['capture', 'settlement'])) {
            $pesanan->update(['status_pembayaran' => 'success']);
        } elseif ($status === 'expire') {
            $pesanan->update(['status_pembayaran' => 'expired']);
        } elseif ($status === 'cancel') {
            $pesanan->update(['status_pembayaran' => 'cancelled']);
        }

        return response()->json(['message' => 'OK']);
    }

    /**
     * Halaman setelah pembayaran selesai (finish)
     */
    public function finish(Request $request)
    {
        $orderId = $request->query('order_id');
        $snapToken = $request->query('snap_token');

        $pesanan = $orderId
            ? Pesanan::where('order_id', $orderId)->first()
            : null;

        return inertia('Invoice', compact('pesanan', 'snapToken'));
    }
}