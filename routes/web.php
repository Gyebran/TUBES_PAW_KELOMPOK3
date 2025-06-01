<?php

use Illuminate\Support\Facades\Route;

Route::get('/bookmark', function () {
    return view('bookmark');
})->middleware('auth');
