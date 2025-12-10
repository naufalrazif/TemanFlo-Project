<?php

namespace App\Http\Controllers;
use App\Models\Pesanan;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class DashboardUserController extends Controller
{
       public function index()
    {
        // Ambil semua pesanan lengkap dengan relasi produk & user
     
             $pesanans = Pesanan::with(['user', 'produks', 'detailPesanans.produk'])
            ->where('user_id', Auth::id())       // hanya pesanan user ini
                ->where('status_pembayaran', 'success')
                ->orderBy('created_at', 'desc')
                ->get(); 


        return Inertia::render('DashboardUser', [
            'pesanans' => $pesanans,
        ]);
    }
}
