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
    <header>
        <a href="{{route('adminarticle.index')}}">カジの輪</a>
        @auth
            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit(); logout();">
                <p>ログアウト</p>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        @else
            <a href="{{ route('login') }}"><p>ログイン</p></a>
        @endauth
    </header>
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
                <a href="{{ route('article.delete',$article->id) }}" class="btn btn-danger" onclick="return confirm('本当に削除しますか？');">削除</a>
        </article>
        @empty
        <p>記事がありません。</p>
        @endforelse
        <!-- ページネーションリンク -->
        {{ $articles->appends(request()->except('page'))->links() }}
    </main>
    <footer>
        <ul>
            <li class="foot"><img src="/image/知恵袋一覧アイコン.png"><a href="{{route('adminquestion.index')}}"><p>知恵袋</p><p>削除</p></a></li>
            <li class="foot2"><img src="/image/Line.png"></li>
            <li class="foot"><img src="/image/記事一覧アイコン.png"><a href="{{route('adminarticle.index')}}"><p>記事</p><p>削除</p></a></li>
        </ul>
    </footer>
    <script src="/js/logout.js"></script>
</body>

</html>
