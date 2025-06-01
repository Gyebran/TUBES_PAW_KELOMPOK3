<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\KaryaController;
use App\Http\Controllers\ReportController;

Route::middleware('guest')->group(function () {
    Route::get('/register', [RegisterController::class, 'showRegisterForm'])->name('register');
    Route::post('/register', [RegisterController::class, 'register'])->name('register.submit');

    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login'])->name('login.submit');
});

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [KaryaController::class, 'index'])->name('dashboard');
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

    Route::get('/karya/create', [KaryaController::class, 'create'])->name('karya.create'); // form tambah karya
    Route::post('/karya', [KaryaController::class, 'store'])->name('karya.store'); // simpan karya

    Route::get('/karya/{id}/edit', [KaryaController::class, 'edit'])->name('karya.edit'); // form edit karya
    Route::put('/karya/{id}', [KaryaController::class, 'update'])->name('karya.update'); // update karya
    Route::delete('/karya/{id}', [KaryaController::class, 'destroy'])->name('karya.destroy'); // hapus karya
});

Route::middleware('auth')->group(function () {
    Route::post('/report', [ReportController::class, 'store'])->name('reports.store');
    Route::get('/reports', [ReportController::class, 'index'])->name('reports.index');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/karya/{id}/edit', [KaryaController::class, 'edit'])->name('karya.edit');
    Route::put('/karya/{id}', [KaryaController::class, 'update'])->name('karya.update');
});

