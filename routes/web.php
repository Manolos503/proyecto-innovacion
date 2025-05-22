<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuestionsController;
use App\Http\Controllers\HasuraTestController;

Route::get('/', function () {
    return view('index');
})->name('index');
Route::view('/degree', 'degree')->name('degree');
Route::get('/questions', [QuestionsController::class, 'index'])->name('questions');
Route::view('/test', 'testAptitudinal')->name('test.aptitudinal');
Route::get('/test', [HasuraTestController::class, 'showQuestions'])->name('test');
Route::view('/institution', 'institution')->name('institution');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
