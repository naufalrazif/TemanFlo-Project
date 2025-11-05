<?php

use App\Http\Controllers\ProdukController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

//route melihat daftar produk
Route::get('/produk', [ProdukController::class, 'index'])->name('produk.index');

//route menambah produk
Route::get('/produk/create', [ProdukController::class, 'create'])->name('produk.create');
Route::post('/produk', [ProdukController::class, 'store'])->name('produk.store');

//route menghapus produk
Route::delete('/produk/{id}', [ProdukController::class, 'destroy'])->name('produk.destroy');

//route mengedit produk
Route::get('/produk/{id}/edit', [ProdukController::class, 'edit'])->name('produk.edit');
Route::put('/produk/{id}', [ProdukController::class, 'update'])->name('produk.update');

//route halaman pembayaran
Route::get('/payment', function () {
    return Inertia::render('Payment'); // nama harus sama dengan file di resources/js/pages/Payment.vue
})->name('payment');

// route halaman cart
Route::get('/cart', function () {
    return Inertia::render('Cart'); // pastikan ada file Cart.vue di resources/js/Pages/
})->name('cart');





