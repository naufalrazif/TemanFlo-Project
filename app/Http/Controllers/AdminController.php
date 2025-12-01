<?php

namespace App\Http\Controllers;
use App\Models\Pesanan;
use Inertia\Inertia;
use Illuminate\Http\Request;

class AdminController extends Controller
{
        public function index()
    {
        // Ambil semua pesanan lengkap dengan relasi produk & user
        $pesanans = Pesanan::with(['user', 'Produks','detailPesanans.produk'])
            ->orderBy('created_at', 'desc');
                $pesanans = Pesanan::with(['user', 'produks', 'detailPesanans.produk'])
            ->where('status_pembayaran', 'success') // filter hanya yang sukses
            ->orderBy('created_at', 'desc')
    
            ->get();

        return Inertia::render('Admin/Dashboard', [
            'pesanans' => $pesanans,
        ]);
    }
}

