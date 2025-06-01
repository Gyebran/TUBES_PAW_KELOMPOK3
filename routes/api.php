<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookmarkController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/bookmark', [BookmarkController::class, 'index']);
    Route::post('/bookmark', [BookmarkController::class, 'store']);
    Route::delete('/bookmark/{id}', [BookmarkController::class, 'destroy']);
});
