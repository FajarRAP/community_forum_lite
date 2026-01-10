<?php

use App\Http\Controllers\AnswerController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\VoteController;
use Illuminate\Support\Facades\Route;

Route::fallback(fn() => redirect('/questions'));

Route::get('/', fn() => redirect('/questions'));
Route::get('/dashboard', fn() => redirect('/questions'))->name('dashboard');
Route::get('/about', fn() => view('about'))->name('about');

Route::get('/questions', [QuestionController::class, 'index'])->name('home');
Route::get('/questions/{question}/{slug}', [QuestionController::class, 'show'])->name('question.show');
Route::middleware(['auth'])->group(function () {
    Route::get('/questions/create', [QuestionController::class, 'create'])->name('question.create');
    Route::get('/question/edit/{question}', [QuestionController::class, 'edit'])->name('question.edit');
    Route::post('/questions', [QuestionController::class, 'store'])->name('question.store');
    Route::patch('/questions/{question}', [QuestionController::class, 'update'])->name('question.update');
    Route::delete('/questions/{question}', [QuestionController::class, 'destroy'])->name('question.destroy');

    Route::get('/answers/{answer}/edit', [AnswerController::class, 'edit'])->name('answer.edit');
    Route::post('/questions/{question}/answers', [AnswerController::class, 'store'])->name('answer.store');
    Route::put('/answers/{answer}', [AnswerController::class, 'update'])->name('answer.update');
    Route::delete('/answers/{answer}', [AnswerController::class, 'destroy'])->name('answer.destroy');
    Route::patch('/answers/{answer}/best', [AnswerController::class, 'markAsBest'])
        ->name('answer.markAsBest');

    Route::post('/vote/{type}/{id}', VoteController::class)->name('vote');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__ . '/auth.php';
