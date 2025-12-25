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
        
            $pesanans = Pesanan::with(['user', 'produks', 'detailPesanans.produk'])
            ->where('status_pembayaran', 'success') // filter hanya yang sukses
            ->orderBy('created_at', 'desc')
    
            ->get();

        return Inertia::render('Admin/Dashboard', [
            'pesanans' => $pesanans,
        ]);
    }

    public function updateStatus(Request $request, $id)
    {
        // Validasi input
        $validated = $request->validate([
            'status' => 'required|string|in:dalam proses,selesai,batal'
        ]);

        // Ambil pesanan
        $pesanan = Pesanan::findOrFail($id);

        // Update status
        $pesanan->status = $validated['status'];
        $pesanan->save();

        return back()->with([
            'message' => 'Status pesanan berhasil diperbarui.'
        ]);
    }


    
}
