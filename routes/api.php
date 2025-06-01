<?php

use App\Http\Middleware\IsAdmin;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BookmarkController;

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout',[AuthController::class, 'logout'])->middleware('auth:sanctum');
Route::middleware('auth:sanctum')->put('/profile', [UserController::class, 'updateProfile']);
Route::middleware(['auth:sanctum'])->get('/profile', [UserController::class, 'getProfile']);
Route::middleware(['auth:sanctum', IsAdmin::class])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index']);
});

Route::middleware(['auth'])->group(function () {
    Route::get('/profile/edit', function () {
        return view('profile.edit');
    })->name('profile.edit');

    Route::post('/profile/update', [UserController::class, 'updateProfile'])->name('profile.update');

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/bookmark', [BookmarkController::class, 'index']);
    Route::post('/bookmark', [BookmarkController::class, 'store']);
    Route::delete('/bookmark/{id}', [BookmarkController::class, 'destroy']);

});