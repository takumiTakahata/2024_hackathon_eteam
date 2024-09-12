<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Tag;
use App\Models\Articles_Tag;

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

    public function articleAdd(Request $request)
    {
        // バリデーション
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
            'tags' => 'required|array',
        ]);

        // 記事を保存
        $article = new Article();
        $article->title = $validatedData['title'];
        $article->text = $validatedData['content'];
        $article->save();

        // 記事とタグの中間テーブルに保存
        foreach ($validatedData['tags'] as $tagId) {
            Articles_Tag::create([
                'articles_id' => $article->id,
                'tags_id' => $tagId,
            ]);
        }

        return redirect()->route('article_list');
    }
}