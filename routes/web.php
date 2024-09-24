<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;

// '/'がURLになる
// ルートのviewsにあるwelcome画面を開く設定
Route::get('/', function () {
    return view('welcome');
});

Route::get('/Article_List', function () {
    return view('Article_List');
});

Route::get('/Article_submission', function () {
    return view('Article_submission');
});
Route::get('/top', function () {
    return view('index');
});
Route::get('/add/article/', [ArticleController::class, 'articleCreate'])->name('articleCreate');
Route::post('/comfirm/article/', [ArticleController::class, 'articleConfirm'])->name('article.comfirm');
Route::post('/articles/add', [ArticleController::class, 'articleAdd'])->name('article.add');
