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

    public function articleConfirm(Request $request)
    {
        // バリデーション
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
            'tags' => 'required|array',
        ]);

        // タグ情報を取得
        $tags = Tag::whereIn('id', $validatedData['tags'])->get();

        // 確認画面にデータを渡す
        return view('articleConfirm', [
            'title' => $validatedData['title'],
            'content' => $validatedData['content'],
            'tags' => $tags,
            'tag_ids' => $validatedData['tags'],
        ]);
    }
}
