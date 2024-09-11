<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Question;
use App\Models\Tag;

class QuestionController extends Controller
{
    public function index(Request $request)
    {
        $Tags = Tag::all();
        return view('question', ['Tags' => $Tags]);
    }
}
