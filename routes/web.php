<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuestionController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/add/question',[QuestionController::class,'index']);
Route::post('/question', [QuestionController::class, 'store'])->name('question.store');
Route::get('/show', [QuestionController::class, 'show'])->name('question.show');
