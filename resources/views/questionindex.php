<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/css/reset.css">
    <link rel="stylesheet" href="/css/article_list.css">
</head>

<body>
    <header>
        <p>アプリ名</p>
    </header>
    <main>
        <h1>記事一覧</h1>
        <div class="">
            <h2 class="serch">▶タグ検索<span class="span_two">(複数選択可)</span></h2>
        </div>
        <div class="tags">
            <button class="tag">洗濯</button>
            <button class="tag">洗い物</button>
            <button class="tag">掃除</button>
            <button class="tag">買い物</button>
            <button class="tag">食事</button>
            <button class="tag">その他</button>
        </div>
        <div class="filters">
            <button class="filter active">投稿日時が新しい順</button>
            <button class="filter">いいねが多い順</button>
        </div>
    </div>


        <div class="Post">
            <h2 class="action">▶投稿された知恵袋</h2>
            <div class="list">
                <div class="item">
                <div class="actions">
                <span class="date">2024/09/09</span>
                    <span class="likes">
                            <img src="{{ asset('/images/nice.jpg) }}" class="icon">1.111
                    </span>
                    </div>
                    <div class="content">
                        <h3 class="title">タイトルタイトル</h3>
                        <span class="tagsd">タグ　タグ</span>
                    </div>
                    <span class="arrow">&gt;</span>
                </div>
                <div class="item">
                <div class="actions">
                <span class="date">2024/09/09</span>
                    <span class="likes">
                            <img src="{{ asset('/images/nice.jpg) }}" class="icon">1.111
                    </span>
                    </div>
                    <div class="content">
                        <h3 class="title">タイトルタイトル</h3>
                        <span class="tagsd">タグ　タグ</span>
                    </div>
                    <span class="arrow">&gt;</span>
                </div>
                <div class="item">
                <div class="actions">
                <span class="date">2024/09/09</span>
                    <span class="likes">
                            <img src="{{ asset('/images/nice.jpg) }}" class="icon">1.111
                    </span>
                    </div>
                    <div class="content">
                        <h3 class="title">タイトルタイトル</h3>
                        <span class="tagsd">タグ　タグ</span>
                    </div>
                    <span class="arrow">&gt;</span>
                </div>
            </div>


    </main>
    <footer>
        <ul>
            <li class="foot"><img src="{{ asset('image/知恵袋アイコン.png) }}"><a href="">知恵袋<br>投稿</a></li>
            <li class="foot2"><img src=""></li>
            <li class="foot"><a href="">記事<br>投稿</a></li>
            <li class="foot2"><img src=""></li>
            <li class="foot"><a href="">知恵袋<br>一覧</a></li>
            <li class="foot2"><img src=""></li>
            <li class="foot"><a href="">記事<br>一覧</a></li>
        </ul>
    </footer>
</body>

</html>