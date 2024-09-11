<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Tag;

class ArticleController extends Controller
{
    public function articleCreate(Request $request)
    {
        $tags = Tag::all();
        return view('article', ['tags' => $tags]);
    }
}
