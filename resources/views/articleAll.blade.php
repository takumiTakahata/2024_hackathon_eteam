<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/reset.css">
    <link rel="stylesheet" href="/css/article_detail.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>Document</title>
</head>
<body>
    <main>
        <p class="page_title">投稿記事</p>
        <div class="confirm">
            <!-- タイトル確認 -->
            <p class="title">{{ $article->title}}</p>
            <!-- タグ確認 -->
            <ul class="tag-group">
                @foreach (explode(',', str_replace(['[', ']', '"'], '', $article_tag)) as $tag)
                    <li>{{ $tag }}</li>
                @endforeach
            </ul>
            @if ($article->movie_url)
            @php
            // YouTubeのURLをembed用に変換
            $youtube_url =$article->movie_url;
            $youtubeEmbedUrl = str_replace('watch?v=', 'embed/', $youtube_url);
            @endphp
            <!-- 動画埋め込み -->
            <div class="youtube-video">
                <iframe width="80%" height="50%" src="{{ $youtubeEmbedUrl }}" frameborder="0" allowfullscreen></iframe>
            </div>
            @endif
            <!-- 内容確認 -->
            <p class="content">{{ $article -> text}}</p>
                    <button type="button" class="good_button" onclick="popularAdd()">
            <i class="fas fa-thumbs-up"></i><p>いいね</p></button>
        </div>
        <a href="{{route('article.index')}}" class="article_return">＜　記事一覧に戻る</a>
    </main>
    <footer>
        <a href="{{route('qestionCreate')}}">知恵袋投稿</a>
        <a href="{{route('articleCreate')}}">記事投稿</a>
        <a href="{{route('question.index')}}">知恵袋一覧</a>
        <a href="{{route('article.index')}}">記事一覧</a>
    </footer>
</body>
<script src="{{ asset('js/popular.js') }}">
</script>
</html>
