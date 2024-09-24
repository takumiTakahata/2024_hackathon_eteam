<?php
namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Question;
use Illuminate\Support\Facades\Auth;

class UserPostController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $articles = Article::where('user_id', $user->id)->get();
        $questions = Question::where('user_id', $user->id)->get();

        return view('user_posts.index', compact('articles', 'questions'));
    }
}
