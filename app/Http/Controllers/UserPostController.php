<?php
namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserPostController extends Controller
{
    public function index()
    {
        // 現在のユーザーのIDを取得
        $userId = Auth::id();

        // ユーザーに関連する投稿と質問を取得
        $posts = Post::where('user_id', $userId)->get();
        $questions = Question::where('user_id', $userId)->get();

        // ビューにデータを渡す
        return view('userpost', compact('posts', 'questions'));
    }
}
