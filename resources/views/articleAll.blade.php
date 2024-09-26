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
    <header>
        <a href="{{route('index')}}">アプリ名</a>
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
        <p class="page_title">投稿記事</p>
        <div class="confirm">
            <!-- タイトル確認 -->
            <p class="title">{{ $article->title}}</p>
            <!-- タグ確認 -->
            <ul class="tag-group">
                @forelse ($article->tags as $tag)
                <li>{{ $tag->name }}</li>
                @empty
                <li>タグはありません</li>
                @endforelse
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
    <ul>
      <li class="foot"><img src="/image/知恵袋アイコン.png"><a href="{{route('qestionCreate')}}"><p>知恵袋</p><p>投稿</p></a></li>
      <li class="foot2"><img src="/image/Line.png"></li>
      <li class="foot"><img src="/image/記事アイコン.png"><a href="{{route('articleCreate')}}"><p>記事</p><p>投稿</p></a></li>
      <li class="foot2"><img src="/image/Line.png"></li>
      <li class="foot"><img src="/image/知恵袋一覧アイコン.png"><a href="{{route('question.index')}}"><p>知恵袋</p><p>一覧</p></a></li>
      <li class="foot2"><img src="/image/Line.png"></li>
      <li class="foot"><img src="/image/記事一覧アイコン.png"><a href="{{route('article.index')}}"><p>記事</p><p>一覧</p></a></li>
    </ul>
  </footer>
</body>
<script src="{{ asset('js/popular.js') }}">
</script>
</html>
