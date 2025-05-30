<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookmarkController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('bookmarks')->group(function () {
    Route::get('/bookmarks', [BookmarkController::class, 'index']); // Menampilkan semua bookmark milik user
    Route::post('/bookmarks', [BookmarkController::class, 'store']); // Menambahkan bookmark
    Route::delete('/bookmarks', [BookmarkController::class, 'destroy']); // Menghapus bookmark berdasarkan ID
});