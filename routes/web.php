<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QuestionController;
use Illuminate\Support\Facades\Route;

Route::get('/', fn() => redirect('/questions'));

Route::get('/questions', [QuestionController::class, 'index'])->name('home');
Route::get('/questions/{question}/{slug}', [QuestionController::class, 'show'])->name('question.show');
Route::middleware(['auth'])->group(function () {
    Route::get('/questions/create', [QuestionController::class, 'create'])->name('question.create');
    Route::get('/questions/{question}/edit', [QuestionController::class, 'edit'])->name('question.edit');
    Route::post('/questions', [QuestionController::class, 'store'])->name('question.store');
    Route::patch('/questions/{question}', [QuestionController::class, 'update'])->name('question.update');
    Route::delete('/questions/{question}', [QuestionController::class, 'destroy'])->name('question.destroy');
});

Route::get('/about', null)->name('about');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
