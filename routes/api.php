<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProductApiController;
use App\Http\Controllers\Api\AuthController;
use Illuminate\Support\Facades\Storage;


// Routes publik (tidak butuh auth)
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::apiResource('products', ProductApiController::class);


Route::get('/image/{path}', function ($path) {
    if (!preg_match('#^foto/[a-zA-Z0-9._-]+\.(jpg|jpeg|png)$#i', $path)) {
        abort(403, 'Akses ditolak');
    }

    $fullPath = storage_path('app/public/' . $path);
    if (!file_exists($fullPath)) {
        abort(404);
    }

    $mime = mime_content_type($fullPath);
    $content = file_get_contents($fullPath);

    return response($content, 200)
        ->header('Content-Type', $mime)
        ->header('Access-Control-Allow-Origin', '*');
})->where('path', '.*');



