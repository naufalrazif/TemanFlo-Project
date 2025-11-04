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


//Lailla mulai disini
Route::get('/', function () {
    return Inertia::render('Home');
});
Route::get('/signup', function () {
    return Inertia::render('SignUp');
});
Route::get('/login', function () {
    return Inertia::render('Login');
});
Route::get('/guide', function () {
    return Inertia::render('OrderGuide');
});
Route::get('/footer', function () {
    return Inertia::render('About');
});
Route::get('/allbunga', function () {
    return Inertia::render('AllBunga');
});
Route::get('/lihat', function () {
    return Inertia::render('LihatProdukAdmin');
});

Route::get('/tambah-produk', function () {
    return Inertia::render('LihatProdukAdmin', [
        'modal' => 'TambahProduk', // dikirim ke layout
    ]);
});
Route::get('/edit-produk', function () {
   return Inertia::render('LihatProdukAdmin', [
        'modal' => 'Edit', // dikirim ke layout
    ]);
});

Route::get('/custom-order', function () {
   return Inertia::render('CustomOrder');
});


