<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/add/article/', [ArticleController::class, 'articleCreate'])->name('articleCreate');
Route::post('/comfirm/article/', [ArticleController::class, 'articleConfirm'])->name('article.comfirm');
