<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
Route::view('../views/', 'inicio');
Route::view('../views/', 'carreras');
Route::view('../views/', 'testAptitudinal');

    return view('inicio');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
