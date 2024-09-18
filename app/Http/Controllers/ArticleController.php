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
            'youtube_url' => ['nullable', 'regex:/^(https?\:\/\/)?(www\.youtube\.com|youtu\.?be)\/.+$/'],
        ]);

        // タグ情報を取得
        $tags = Tag::whereIn('id', $validatedData['tags'])->get();

        // 確認画面にデータを渡す
        return view('articleConfirm', [
            'title' => $validatedData['title'],
            'content' => $validatedData['content'],
            'tags' => $tags,
            'tag_ids' => $validatedData['tags'],
            'youtube_url' => $validatedData['youtube_url'],
        ]);
    }

    public function articleAdd(Request $request)
    {
        // バリデーション
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
            'tags' => 'required|array',
            'youtube_url' => ['nullable', 'regex:/^(https?\:\/\/)?(www\.youtube\.com|youtu\.?be)\/.+$/'],
        ]);

        // 記事を保存
        $article = new Article();
        $article->title = $validatedData['title'];
        $article->text = $validatedData['content'];
        if (!empty($validatedData['youtube_url'])) {
            $article->movie_url = $validatedData['youtube_url'];
        }
        $article->save();

        // 記事とタグの中間テーブルに保存
        foreach ($validatedData['tags'] as $tagId) {
            Articles_Tag::create([
                'articles_id' => $article->id,
                'tags_id' => $tagId,
            ]);
        }

        return redirect('/top');
    }

    public function articleAll($id){
        $article = Article::Where('id', $id)->first();

        $article_tag = Articles_Tag::where('articles_id', $id)->get();
        // $id = $article_tag->tags_id;
        // $article_tag_name = Tag::where('id', $article_tag[0]->tags_id)->get();

        $tags = [];

        foreach($article_tag as $tags_id){
            $tmp = Tag::where('id', $tags_id->tags_id)->first();
            
            array_push($tags, $tmp["name"]);
        }

        $result = json_encode($tags);

        return view('articleAll', ['article' => $article, 'article_tag' => $result]);
    }
}