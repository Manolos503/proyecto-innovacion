<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuestionsController;
use App\Http\Controllers\HasuraTestController;
use App\Http\Controllers\ResultadoController;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('index');
})->name('index');
Route::view('/degree', 'degree.degree')->name('degree');
Route::get('/questions', [QuestionsController::class, 'questions'])->name('questions');
Route::view('/institution', 'institution.institution')->name('institution');
Route::get('/test', [HasuraTestController::class, 'showQuestions'])->name('test');
Route::post('/test', [HasuraTestController::class, 'saveAnswer'])->name('test.save');

Route::post('/enviar-user-id', [ResultadoController::class, 'mostrarResultados']);

Route::get('auth0', [AuthController::class, 'auth0']);
Route::get('callback', [AuthController::class, 'callback']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
