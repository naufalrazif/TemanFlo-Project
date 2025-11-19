<?php

namespace App\Http\Controllers;
use App\Models\Keranjang;
use App\Models\item_keranjang;
use App\Models\Pesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    public function store(Request $request)
    {
        // SETTING MIDTRANS
        \Midtrans\Config::$serverKey = config('midtrans.server_key');
        \Midtrans\Config::$isProduction = false;
        \Midtrans\Config::$isSanitized = true;
        \Midtrans\Config::$is3ds = true;

        // Simpan pesanan ke database
        $pesanan = Pesanan::create([
            'user_id' => Auth::id(),
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'no_telp' => $request->no_telp,
            'metode_pembayaran' => $request->metode,
            'status_pembayaran' => "pending",
        ]);

        

        // Parameter transaksi untuk Midtrans
        $payload = [
            'transaction_details' => [
                'order_id' => $pesanan->id,
                'gross_amount' => $request->total,
            ],
            'customer_details' => [
                'first_name' => Auth::user()->name,
            ],
            'enabled_payments' => [
                'shopeepay', 'gopay', 'bri_va', 'bca_va'
            ]
        ];

        // Request SNAP TOKEN
        $snapToken = \Midtrans\Snap::getSnapToken($payload);

        // Simpan transaction ID
        $pesanan->midtrans_transaction_id = $snapToken;
        $pesanan->save();

        // Kirim ke Payment.vue
        return inertia()->location(url()->previous() . '?snap_token=' . $snapToken);
        
        $keranjang = Keranjang::where('user_id', Auth::id())->first();

        foreach($keranjang->itemKeranjang as $item){
            $pesanan->detailPesanans()->create([
                'produk_id' => $item->produk_id,
                'jumlah' => $item->jumlah,
                'subtotal' => $item->produk->harga * $item->jumlah,
            ]);
        }

        // Opsional: hapus item dari keranjang setelah checkout
        //$keranjang->itemKeranjang()->delete();

}
}
