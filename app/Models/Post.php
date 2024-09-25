<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Post; // Postモデルをインポート
use App\Models\Question; // Questionモデルもインポート
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Post extends Model
{
    use HasFactory;

    // マスアサインメントを許可する属性
    protected $fillable = [
        'title',
        'text',
        'user_id', // ユーザーIDも追加
    ];

    public function index()
    {
        $userId = Auth::id();
        $posts = Post::where('user_id', $userId)->get();
        $questions = Question::where('user_id', $userId)->get();

        return view('userpost', compact('posts', 'questions'));
    }
}
