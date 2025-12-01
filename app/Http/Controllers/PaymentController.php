<?php

namespace App\Http\Controllers;
use App\Models\Keranjang;
use App\Models\item_keranjang;
use App\Models\Pesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class PaymentController extends Controller
{
    public function token(Request $request)
    {
        // SETTING MIDTRANS
        \Midtrans\Config::$serverKey = config('midtrans.server_key');
        \Midtrans\Config::$isProduction = false;
        \Midtrans\Config::$isSanitized = true;
        \Midtrans\Config::$is3ds = true;

        $orderId = 'INV-' . time();

        // Simpan pesanan ke database
        $pesanan = Pesanan::create([
            'order_id' => $orderId,
            'user_id' => Auth::id(),
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'no_telp' => $request->no_telp,
            'metode_pembayaran' => $request->metode,
            'status_pembayaran' => "pending",
        ]);

        //detail pesanan
        $keranjang = Keranjang::where('user_id', Auth::id())->first();

        foreach($keranjang->itemKeranjang as $item){
            $pesanan->detailPesanans()->create([
                'produk_id' => $item->produk_id,
                'jumlah' => $item->jumlah,
                'subtotal' => $item->produk->harga * $item->jumlah,
            ]);
        }
        

        // Parameter transaksi untuk Midtrans
        $payload = [
            'transaction_details' => [
                'order_id' => $orderId, 
                'gross_amount' => $request->total,
            ],
            'customer_details' => [
                'first_name' => Auth::user()->name,
            ],
            'callbacks' => [
                'finish' => 'http://localhost:8000/checkout/finish',
                'error'  => 'http://localhost:8000/checkout/finish',
                'pending' => 'http://localhost:8000/checkout/finish',
            ],
                    

        ];

        // Request SNAP TOKEN
        $snapToken = \Midtrans\Snap::getSnapToken($payload);

        // Simpan transaction ID


        // Kirim ke Payment.vue
        return inertia()->location(url()->previous() . '?snap_token=' . $snapToken);
        
        /*
        
        */
        //$keranjang->itemKeranjang()->delete();
    }

    public function webhook(Request $request){
        $notif = $request->all();

        $orderId = $notif['order_id'];
        $status  = $notif['transaction_status']; 

        $pesanan = Pesanan::where('order_id', $orderId)->first();

        if (!$pesanan) {
            return response()->json(['message' => 'Order not found'], 404);
        }

        if ($status === "capture" || $status === "settlement") {
            $pesanan->update([
                'status_pembayaran' => 'success'
                
            ]);
        } elseif ($status === "expire") {
            $pesanan->update([
                'status_pembayaran' => 'expired'
            ]);
        } elseif ($status === "cancel") {
            $pesanan->update([
                'status_pembayaran' => 'cancelled'
            ]);
        }

        return response()->json(['message' => 'OK']);
    }

    public function finish(Request $request)
    {
        $orderId = $request->query('order_id'); 
        $pesanan = Pesanan::where('order_id', $orderId)->first();

        return inertia('Invoice',compact('pesanan'));
    }
}
