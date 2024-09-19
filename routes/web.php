<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\QuestionController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/top', function () {
    return view('index');
});
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
Route::get('/question', [QuestionController::class, 'questionindex'])->name('question.index');
Route::get('/articles/{id}', [ArticleController::class, 'articleAll'])->name('articleAll');
<<<<<<< HEAD
Route::get('/top', [ArticleController::class, 'index'])->name('index');
=======
Route::get('/articles', [ArticleController::class, 'articleindex'])->name('article.index');
>>>>>>> create/articleindex/tomaki
