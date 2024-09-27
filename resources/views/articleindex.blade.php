<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/reset.css">
    <link rel="stylesheet" href="/css/list.css">
    <title>記事一覧</title>
</head>

<body>
    <header>
        <a href="{{route('index')}}">カジの輪</a>
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
        @if (session('status'))
            <script>
                window.flashMessage = '{{ session('status') }}';
            </script>
        @endif
        <p class="page_title">記事一覧</p>
        <div class="tag-buttons">
            <form id="tag-filter-form" method="GET" action="{{ route('article.index') }}">
                @foreach ($tags as $tag)
                <label class="tag-checkbox">
                    <input type="checkbox" name="tag_ids[]" value="{{ $tag->id }}"
                        {{ is_array(request()->input('tag_ids')) && in_array($tag->id, request()->input('tag_ids')) ? 'checked' : '' }}
                        onchange="this.form.submit()">
                    <span>{{ $tag->name }}</span>
                </label>
                @endforeach
            </form>
        </div>
        @forelse ($articles as $article)
        <div class="lists">
            <div class="page">
                <p class="posted_on">{{ $article->created_at->format('Y-m-d') }}</p>
                <a href="{{ route('articleAll', $article->id) }}" class="title">{{ $article->title }}</a>
                <a href="{{ route('articleAll', $article->id) }}" class="link">></a>
            </div>
            <p class="popular">{{ $article->popular }}いいね</p>
            <ul class="tags">
                @foreach ($article->tags as $tag)
                <li class="tag">{{ $tag->name }}</li>
                @endforeach
            </ul>
        </div>
        @empty
        <p>記事がありません。</p>
        @endforelse
        <!-- ページネーションリンク -->
        {{ $articles->appends(request()->except('page'))->links('pagination.custom') }}
    </main>
    <footer>
    <ul>
      <li class="foot"><a href="{{route('qestionCreate')}}"><img src="/image/知恵袋アイコン.png"><p>知恵袋投稿</p></a></li>
      <li class="foot2"><img src="/image/Line.png"></li>
      <li class="foot"><a href="{{route('articleCreate')}}"><img src="/image/記事アイコン.png"><p>記事投稿</p></a></li>
      <li class="foot2"><img src="/image/Line.png"></li>
      <li class="foot"><a href="{{route('question.index')}}"><img src="/image/知恵袋一覧アイコン.png"><p>知恵袋一覧</p></a></li>
      <li class="foot2"><img src="/image/Line.png"></li>
      <li class="foot"><a href="{{route('article.index')}}"><img src="/image/記事一覧アイコン.png"><p>記事一覧</p></a></li>
    </ul>
    </footer>
    <script src="/js/logout.js"></script>
</body>
</html>
