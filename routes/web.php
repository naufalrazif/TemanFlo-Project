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
use App\Http\Controllers\OtpController;
use App\Http\Controllers\Auth\RegisteredUserController; 
use App\Http\Middleware\RoleMiddleware;
use App\Services\RecaptchaService;
use App\Http\Controllers\KatalogController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CustomController;


Route::get('/', [DashboardController::class, 'index'])
    ->name('dashboard');

// ✅ OTP ROUTES UNTUK REGISTER (DI LUAR AUTH - HARUS BISA DIAKSES SEBELUM LOGIN)
Route::get('/otp-verification', [OtpController::class, 'showVerificationForm'])->name('otp.verification');
Route::post('/verify-otp', [OtpController::class, 'verifyOtp'])->name('otp.verify');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    // keranjang
    Route::post('/keranjang/tambah', [KeranjangController::class, 'tambah']);
    Route::get('/keranjang', [KeranjangController::class, 'index'])->name('keranjang.index');
    Route::put('/keranjang/update', [KeranjangController::class, 'update'])->name('keranjang.update');
    Route::delete('/keranjang/{id}', [KeranjangController::class, 'destroy'])->name('keranjang.delete');

    // payment
    Route::get('/checkout', [KeranjangController::class, 'checkout'])->name('checkout');
    Route::post('/checkout', [PaymentController::class, 'store'])->name('pesanan.store');
    Route::post('/checkout/bayar', [PaymentController::class, 'token'])->name('pesanan.token');
});

Route::middleware(['auth',  RoleMiddleware::class . ':admin'])->group(function () {
    Route::get('/produk', [ProdukController::class, 'index'])->name('produk.index');
    
    // route menambah produk
    Route::get('/produk/create', [ProdukController::class, 'create'])->name('produk.create');
    Route::post('/produk', [ProdukController::class, 'store'])->name('produk.store');
    
    // route menghapus produk
    Route::delete('/produk/{id}', [ProdukController::class, 'destroy'])->name('produk.destroy');
    
    // route mengedit produk
    Route::get('/produk/{id}/edit', [ProdukController::class, 'edit'])->name('produk.edit');
    Route::put('/produk/{id}', [ProdukController::class, 'update'])->name('produk.update');
    Route::patch('/produk/{id}', [ProdukController::class, 'update'])->name('produk.update');


     //dashboard admin
    Route::get('/dashboard-admin', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::put('/admin/pesanan/{id}/status', [AdminController::class, 'updateStatus']);
});

// route melihat daftar produk
// lihat detail produk
Route::get('/buket/{id}', [DashboardController::class, 'show'])->name('produk.detail');
//custom
Route::get('/custom-order', [CustomController::class, 'index'])->name('custom');

// navbar
Route::get('/allbunga', [NavbarController::class, 'katalog'])->name('katalog');
Route::get('/about', [NavbarController::class, 'about'])->name('about');

Route::get('/test-captcha', function () {
    return [
        'captcha_class_exists' => class_exists('App\Rules\Captcha'),
        'captcha_key' => env('CAPTCHA_KEY'),
        'captcha_secret' => env('CAPTCHA_SECRET') ? '***' . substr(env('CAPTCHA_SECRET'), -4) : 'Not set',
    ];
});
/*
Route::get('/debug-role', function () {
    if (auth()->check()) {
        return [
            'user_id' => auth()->id(),
            'name' => auth()->user()->name ?? 'N/A',
            'email' => auth()->user()->email ?? 'N/A',
            'role' => auth()->user()->role,
            'expected_role' => 'admin',
            'role_match' => auth()->user()->role === 'admin'
        ];
    }
    return 'Not logged in';
})->middleware('auth');
*/
Route::get('/guide', function () {
    return Inertia::render('OrderGuide');
});
Route::get('/TnC', function () {
    return Inertia::render('T&C');
});

//custom order
//Route::get('/custom-order', [CustomController::class, 'index'])->name('CustomOrder');


//dashboard admin
//Route::get('/dashboard-admin', [AdminController::class, 'index'])->name('admin.dashboard');

Route::get('/checkout/finish', [PaymentController::class, 'finish'])->name('payment.finish');

Route::get('/katalog', function () {
    return Inertia::render('Katalog/Index');
})->name('katalog');

Route::get('/katalog/products', [KatalogController::class, 'products']);
Route::get('/katalog/categories', [KatalogController::class, 'categories']);

// routes/web.php
Route::post('/midtrans/webhook', [PaymentController::class, 'webhook']);

Route::get('/image/{path}', function ($path) {
    $file = storage_path('app/public/foto/' . $path);

    if (!file_exists($file)) {
        abort(404);
    }

    return response()->file($file);
});

require __DIR__.'/auth.php';