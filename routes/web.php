<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KomentarController;
use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'index']);

Route::get('/komentar', [KomentarController::class, 'index'])->name('komentar.index');

Route::post('/komentar', [KomentarController::class, 'store'])->name('komentar.store');

Route::get('/komentar/{id}', [KomentarController::class, 'show'])->name('komentar.show');

Route::delete('/komentar/{id}', [KomentarController::class, 'destroy'])->name('komentar.destroy');