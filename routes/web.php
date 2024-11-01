<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\UserPostController;
require __DIR__.'/auth.php';

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::get('/', [ArticleController::class, 'index'])->name('index');
Route::get('/add/question/', [QuestionController::class, 'questionCreate'])->name('qestionCreate');
Route::post('/comfirm/question/', [QuestionController::class, 'questionConfirm'])->name('question.Confirm');
Route::post('/question/add', [QuestionController::class, 'questionAdd'])->name('question.add');
Route::get('/question/{id}', [QuestionController::class, 'show'])->name('question.show');
Route::get('/add/article/', [ArticleController::class, 'articleCreate'])->name('articleCreate');
Route::post('/comfirm/article/', [ArticleController::class, 'articleConfirm'])->name('article.comfirm');
Route::post('/articles/add', [ArticleController::class, 'articleAdd'])->name('article.add');
Route::post('/question/{id}/answer', [QuestionController::class, 'answerstore'])->name('answer.store');
Route::get('/question', [QuestionController::class, 'index'])->name('question.index');
Route::get('/articles/{id}', [ArticleController::class, 'articleAll'])->name('articleAll');
Route::get('/popular/{id}', [ArticleController::class, 'popularAdd'])->name('popularAdd');
Route::get('/articles', [ArticleController::class, 'articleindex'])->name('article.index');
Route::get('/adminarticles', [ArticleController::class, 'adminarticle'])->middleware(['auth', 'verified'])->name('adminarticle.index');
Route::get('/articles/delete/{id}', [ArticleController::class, 'deleteArticle'])->middleware(['auth', 'verified'])->name('article.delete');
Route::get('/question', [QuestionController::class, 'questionindex'])->name('question.index');
Route::get('/adminquestion', [QuestionController::class, 'adminquestion'])->middleware(['auth', 'verified'])->name('adminquestion.index');
Route::get('/question/delete/{id}', [QuestionController::class, 'deleteQuestion'])->middleware(['auth', 'verified'])->name('question.delete'); 
Route::get('/userpost', [UserPostController::class, 'index'])->middleware('auth');
require __DIR__.'/auth.php';
