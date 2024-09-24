<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/css/reset.css">
    <link rel="stylesheet" href="/css/article_submission.css" >
</head>
<body>
    <header>
        <p>アプリ名</p>
    </header>
    <main>
        <h1>以下の要素に必要情報を入力して下さい</h1>
        <div class="top">
        <div class="titles">
            <h2>▶記事タイトル<span class="span_two">(20文字まで)</span><span class="span_tree">必須</span></h2>
            <input type="text" class="title">
        </div>

            <h2>▶分類タグ<span class="span_two">(複数選択可)</span><span class="span_tree">必須</span></h2>
        <div class="tags">
            <button class="tag">洗濯</button>
            <button class="tag">洗い物</button>
            <button class="tag">掃除</button>
            <button class="tag">買い物</button>
            <button class="tag">食事</button>
            <button class="tag">その他</button>
        </div>

        <div class="titles">
            <h2>▶投稿内容<span class="span_two">(20文字まで)</span><span class="span_tree">必須</span></h2>
            <input type="text" class="title">
        </div>

        <div class="url">
            <h2>▶投稿動画<span class="span_two">(任意)</span></h2>
            <input type="text" class="you"  placeholder="URL">
        </div>

        <a href="" class="btn btn-flat"><span>確認画面に進む</span></a>
    </div>
    </main>
    <footer>
        <ul>
            <li class="foot"><img src="{{ asset('images/知恵袋アイコン.png) }}"><a href="">知恵袋<br>投稿</a></li>
            <li class="foot2"><img src=""></li>
            <li class="foot"><img src="{{ asset('/images/記事アイコン.png)}}"><a href="">記事<br>投稿</a></li>
            <li class="foot2"><img src=""></li>
            <li class="foot"><img src="{{ asset('/images/知恵袋一覧アイコン.png) }}"><a href="">知恵袋<br>一覧</a></li>
            <li class="foot2"><img src=""></li>
            <li class="foot"><img src="{{ asset('/images/記事一覧アイコン.png) }}" ><a href="">記事<br>一覧</a></li>   
        </ul>
    </footer>
    
</body>
</html>