<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KomentarController;
use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'index']);
Route::get('/komentar', [KomentarController::class, 'index'])->name('komentar.index');
Route::post('/komentar', [KomentarController::class, 'store'])->name('komentar.store');
Route::get('/komentar/{id}', [KomentarController::class, 'show'])->name('komentar.show');
Route::delete('/komentar/{id}', [KomentarController::class, 'destroy'])->name('komentar.destroy');

use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ReportController;

Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [UserController::class, 'showProfile'])->name('profile.show');
    Route::post('/profile/update', [UserController::class, 'updateProfile'])->name('profile.update');
    Route::delete('/user/delete', [UserController::class, 'destroy'])->name('user.destroy');
});

Route::middleware('guest')->group(function () {
    Route::get('/register', [RegisterController::class, 'showRegisterForm'])->name('register');
    Route::post('/register', [RegisterController::class, 'register'])->name('register.submit');

    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login'])->name('login.submit');
});

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
});

Route::post('/report', [ReportController::class, 'store'])->middleware('auth');

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/reports', [ReportController::class, 'store'])->name('reports.store');
    Route::get('/reports', [ReportController::class, 'index'])->name('reports.index');
});

Route::fallback(function () {
    abort(404, 'Route tidak ditemukan. Cek URL dan Method.');
});

Route::get('/', [HomeController::class, 'index']);
Route::get('/komentar', [KomentarController::class, 'index'])->name('komentar.index');
Route::post('/komentar', [KomentarController::class, 'store'])->name('komentar.store');
Route::get('/komentar/{id}', [KomentarController::class, 'show'])->name('komentar.show');
Route::delete('/komentar/{id}', [KomentarController::class, 'destroy'])->name('komentar.destroy');
