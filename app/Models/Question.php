<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\Tag;

class Question extends Model
{
    protected $fillable = ['title', 'content'];

    public static $rules = [
        'title' => 'required|string|max:255',
        'content' => 'required|string',
        // 必要に応じて他のルールも追加できます
    ];
}