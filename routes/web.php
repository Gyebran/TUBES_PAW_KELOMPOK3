<?php

use App\Http\Controllers\KomentarController;

Route::middleware(['auth'])->group(function () {
    Route::post('/karya/{karya}/komentar', [KomentarController::class, 'store'])->name('komentar.store');
    Route::get('/komentar/{id}/edit', [KomentarController::class, 'edit'])->name('komentar.edit');
    Route::put('/komentar/{id}', [KomentarController::class, 'update'])->name('komentar.update');
    Route::delete('/komentar/{id}', [KomentarController::class, 'destroy'])->name('komentar.destroy');
});

