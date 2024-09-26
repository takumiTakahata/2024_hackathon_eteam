<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Tag;
use App\Models\Articles_Tag;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    public function articleCreate(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('message', '投稿には、ログインをしてください。');
        } else {
            $tags = Tag::all();
            return view('article', ['tags' => $tags]);
        }
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

        // ログイン中のユーザーのIDを取得
        $userId = Auth::id();

        // 記事を保存
        $article = new Article();
        $article->title = $validatedData['title'];
        $article->text = $validatedData['content'];
        $article->user_id = $userId;
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

        return redirect()->route('article.index');
    }

    public function articleAll($id)
    {
        $article = Article::Where('id', $id)->first();

        $article_tag = Articles_Tag::where('articles_id', $id)->get();
        // $id = $article_tag->tags_id;
        // $article_tag_name = Tag::where('id', $article_tag[0]->tags_id)->get();

        $tags = [];

        foreach ($article_tag as $tags_id) {
            $tmp = Tag::where('id', $tags_id->tags_id)->first();

            array_push($tags, $tmp["name"]);
        }

        $result = json_encode($tags);

        return view('articleAll', ['article' => $article, 'article_tag' => $result]);
    }

    public function popularAdd($id)
    {
        $article = Article::Where('id', $id)->first();
        $popular_num = $article->popular;
        $popular_num++;

        ARticle::where('id', $id)->update(['popular' => $popular_num]);

        return response('Success', 200);
    }

    public function index()
    {
        $top_data = Article::orderBy('popular', 'desc')->limit(3)->get();

        $tags = [];

        for ($i = 0; $i < 3; $i++) {
            $article_tag = Articles_Tag::where('articles_id', $top_data[$i]["id"])->get();
            $tag = [];

            foreach ($article_tag as $tags_id) {
                $tmp = Tag::where('id', $tags_id->tags_id)->first();

                array_push($tag, $tmp["name"]);
            }

            array_push($tags, $tag);
        }

        // $tags = json_encode($tags);

        return view('index', ["top_data" => $top_data, "tags" => $tags]);
    }
    public function articleindex(Request $request)
    {
        // 記事と関連タグを取得するためのクエリビルダー
        $query = Article::with('tags');

        // リクエストにタグIDが含まれている場合のフィルタリング
        if ($request->has('tag_ids')) {
            $tagIds = $request->input('tag_ids');
            if (!empty($tagIds)) {
                $query->whereHas('tags', function ($q) use ($tagIds) {
                    $q->whereIn('tags.id', $tagIds);
                });
            }
        }

        // ページネーションの設定
        $articles = $query->paginate(10)->appends($request->except('page'));

        // タグ一覧の取得
        $tags = Tag::all();

        return view('articleindex', ['articles' => $articles, 'tags' => $tags]);
    }
    public function deleteArticle($id)
    {
        $article = Article::find($id);

        if ($article) {
            $article->update(['delete_flag' => true]);  // delete_flag を true にして削除フラグを立てる
            return redirect()->back()->with('success', '記事が削除されました。');
        }

        return redirect()->back()->with('error', '記事が見つかりませんでした。');
    }

    public function adminarticle(Request $request)
    {
        // 記事と関連タグを取得するためのクエリビルダー
        $query = Article::with('tags');

        // リクエストにタグIDが含まれている場合のフィルタリング
        if ($request->has('tag_ids')) {
            $tagIds = $request->input('tag_ids');
            if (!empty($tagIds)) {
                $query->whereHas('tags', function ($q) use ($tagIds) {
                    $q->whereIn('tags.id', $tagIds);
                });
            }
        }

        // ページネーションの設定
        $articles = $query->paginate(10)->appends($request->except('page'));

        // タグ一覧の取得
        $tags = Tag::all();

        return view('adminarticle', ['articles' => $articles, 'tags' => $tags]);
    }
}
