<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuestionController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/add/question/', [QuestionController::class, 'questionCreate'])->name('qestionCreate');
Route::post('/comfirm/question/', [QuestionController::class, 'questionConfirm'])->name('question.Confirm');
Route::post('/question/add', [QUestionController::class, 'questionAdd'])->name('question.add');