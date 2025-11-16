<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\ProdukController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

/*Route::get('/register', [RegisteredUserController::class, 'create'])
    ->name('register');

Route::post('/register', [RegisteredUserController::class, 'store']);*/

//route biasa
Route::get('/home', function () {
    return Inertia::render('Home');
});

Route::post('/login', [AuthenticatedSessionController::class, 'store'])
    ->name('login');

Route::get('/login', function () {
    return Inertia::render('Login');
});

Route::post('/register', [RegisteredUserController::class, 'store'])->name('register');
Route::get('/signup', function () {
    return Inertia::render('SignUp');
});

Route::get('/guide', function () {
    return Inertia::render('OrderGuide');
});

Route::get('/TnC', function () {
    return Inertia::render('T&C');
});

Route::get('/footer', function () {
    return Inertia::render('About');
});

Route::get('/allbunga', function () {
    return Inertia::render('AllBunga');
});

Route::get('/allsnack', function () {
    return Inertia::render('AllSnack');
});

Route::get('/allboneka', function () {
    return Inertia::render('AllBoneka');
});

Route::get('/dashboard-admin', function (){
    return Inertia::render('DashboardAdmin');
});

/*Route::get('/dashboard', function (){
    return Inertia::render('Dashboard');
});*/

Route::get('/payment-custom', function (){
    return Inertia::render('PaymentCustom');
});

Route::get('/payment', function (){
    return Inertia::render('Payment');
});

Route::get('/detail-pesanan', function (){
    return Inertia::render('DetailPesanan');
});

Route::get('/detail-product', function (){
    return Inertia::render('DetailProduct');
});

Route::get('/cart', function (){
    return Inertia::render('Cart');
});

Route::get('/lihat', function (){
    return Inertia::render('LihatProdukAdmin');
});
Route::get('/tambah-produk', function () {
    return Inertia::render('LihatProdukAdmin', [
        'modal' => 'TambahProduk', // ini yang penting
    ]);
});
Route::post('/produk', [ProdukController::class, 'store'])->name('produk.store');
Route::get('/lihat', [ProdukController::class, 'index'])->name('produk.index');
Route::put('/produk/{id}', [ProdukController::class, 'update'])->name('produk.update');
Route::delete('/produk/{id}', [ProdukController::class, 'destroy'])->name('produk.destroy');



Route::get('/edit', function () {
    return Inertia::render('LihatProdukAdmin', [
        'modal' => 'Edit', // ini yang penting
    ]);
});



require __DIR__.'/auth.php';
