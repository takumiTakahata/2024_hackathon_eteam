<?php

use Illuminate\Support\Facades\Route;

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