<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuestionsController;
use App\Http\Controllers\HasuraTestController;
use App\Http\Controllers\SaludoController;

Route::get('/', function () {
    return view('index');
})->name('index');
Route::view('/degree', 'degree.degree')->name('degree');
Route::get('/questions', [QuestionsController::class, 'questions'])->name('questions');
Route::view('/institution', 'institution.institution')->name('institution');
Route::get('/test', [HasuraTestController::class, 'showQuestions'])->name('test');
Route::post('/test', [HasuraTestController::class, 'saveAnswer'])->name('test.save');

Route::get('/formulario', [SaludoController::class, 'formulario'])->name('formulario');
Route::post('/enviar-nombre', [SaludoController::class, 'enviarNombre']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
