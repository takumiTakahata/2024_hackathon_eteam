<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\QuestionController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/add/question/', [QuestionController::class, 'questionCreate'])->name('qestionCreate');
Route::post('/comfirm/question/', [QuestionController::class, 'questionConfirm'])->name('question.Confirm');
Route::post('/question/add', [QUestionController::class, 'questionAdd'])->name('question.add');
Route::get('/add/article/', [ArticleController::class, 'articleCreate'])->name('articleCreate');
Route::post('/comfirm/article/', [ArticleController::class, 'articleConfirm'])->name('article.comfirm');
Route::post('/articles/add', [ArticleController::class, 'articleAdd'])->name('article.add');
