<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\HasuraTestController;

Route::get('/', function () {
    return view('index');
})->name('index');
Route::view('/carreras', 'carreras')->name('carreras');
Route::get('/faq', [FaqController::class, 'index'])->name('faq');
Route::view('/test', 'testAptitudinal')->name('test.aptitudinal');
Route::get('/hasura-test', [HasuraTestController::class, 'testQuery']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
