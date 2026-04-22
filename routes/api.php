<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
| Di sini tempat kamu daftar route API
|
*/

// Default Laravel (biarin aja)
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


// 🔥 ROUTE API BUKU (CRUD)

// Ambil semua buku
Route::get('/books', [BookController::class, 'index']);

// Ambil buku berdasarkan ID
Route::get('/books/{id}', [BookController::class, 'show']);

// Tambah buku
Route::post('/books', [BookController::class, 'store']);

// Update buku
Route::put('/books/{id}', [BookController::class, 'update']);

// Hapus buku
Route::delete('/books/{id}', [BookController::class, 'destroy']);
