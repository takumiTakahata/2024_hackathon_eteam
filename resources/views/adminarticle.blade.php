<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/reset.css">
    <link rel="stylesheet" href="/css/top.css">
    <title>記事一覧</title>
</head>
<body>
    <main>
        @forelse ($articles as $article)
            <article>
                <p class="title">{{ $article->title }}</p>
                <p class="posted_on">{{ $article->created_at->format('Y-m-d') }}</p>
                <ul class="tag_list">
                    @foreach ($article->tags as $tag)
                        <li class="tag">{{ $tag->name }}</li>
                    @endforeach
                <p class="contents">{{ $article->text }}</p>
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
                <a href="{{ route('article.delete',$article->id) }}" class="btn btn-danger">削除</a>
            </article>
        @empty
            <p>記事がありません。</p>
        @endforelse
        <!-- ページネーションリンク -->
         {{ $articles->appends(request()->except('page'))->links() }}
    </main>
</body>
</html>
