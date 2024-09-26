<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/reset.css">
    <link rel="stylesheet" href="/css/top.css">
    <title>知恵袋一覧</title>
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
        @forelse ($questions as $question)
        <article>
            <p class="title">{{ $question->title }}</p>
            <p class="posted_on">{{ $question->created_at->format('Y-m-d') }}</p>
            <ul class="tag_list">
                @foreach ($question->tags as $tag)
                <li class="tag">{{ $tag->name }}</li>
                @endforeach
                <p class="contents">{{ $question->text }}</p>
                <a href="{{ route('question.delete', $question->id) }}" class="btn btn-danger" onclick="return confirm('本当に削除しますか？');">削除</a>
        </article>
        @empty
        <p>知恵袋がありません。</p>
        @endforelse
        <!-- ページネーションリンク -->
        {{ $questions->appends(request()->except('page'))->links() }}
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
