<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KeranjangController;
use App\Http\Controllers\NavbarController;
use App\Http\Controllers\PaymentController;
use App\Http\Middleware\RoleMiddleware;

Route::get('/', [DashboardController::class, 'index'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    //nambahkan ke keranjangg
    Route::post('/keranjang/tambah', [KeranjangController::class, 'tambah']);
    Route::get('/keranjang', [KeranjangController::class, 'index'])->name('keranjang.index');
    Route::put('/keranjang/update', [KeranjangController::class, 'update'])->name('keranjang.update');
    Route::delete('/keranjang/{id}', [KeranjangController::class, 'destroy'])->name('keranjang.delete');

    //payment
    Route::get('/checkout', [KeranjangController::class, 'checkout'])->name('checkout');
    Route::post('/checkout/bayar', [PaymentController::class, 'token'])->name('pesanan.token');

});
    //webhook
    Route::post('/checkout/webhook', [PaymentController::class, 'webhook']);
    Route::get('/checkout/success', function() {
        return redirect()->route('dashboard'); // arahkan ke home
    })->name('payment.finish');
Route::middleware(['auth',  RoleMiddleware::class . ':admin'])->group(function () {

    Route::get('/produk', [ProdukController::class, 'index'])->name('produk.index');
    
    //route menambah produk
    Route::get('/produk/create', [ProdukController::class, 'create'])->name('produk.create');
    Route::post('/produk', [ProdukController::class, 'store'])->name('produk.store');
    
    //route menghapus produk
    Route::delete('/produk/{id}', [ProdukController::class, 'destroy'])->name('produk.destroy');
    
    //route mengedit produk
    Route::get('/produk/{id}/edit', [ProdukController::class, 'edit'])->name('produk.edit');
    Route::put('/produk/{id}', [ProdukController::class, 'update'])->name('produk.update');
});
//route melihat daftar produk


//lihat detail produk
Route::get('/buket/{id}', [DashboardController::class, 'show'])->name('produk.detail');




//navbar
Route::get('/allbunga', [NavbarController::class, 'katalog'])->name('katalog');
Route::get('/about', [NavbarController::class, 'about'])->name('about');


require __DIR__.'/auth.php';
