<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/reset.css">
    <link rel="stylesheet" href="/css/top.css">
    <title>ページTOP</title>
</head>
<body>
    <header>
        <p>カジの輪</p>
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
        <div class="explanation">
            <p>一人暮らしに苦労している方々の</p>
            <p>悩みの解決や生活を充実させる</p>
            <p>ことができるサイトです。</p>
        </div>
        <div class="recommendation">
            <div class="star"></div>
            <p>おすすめの記事</p>
        </div>
        <article>
            <p class="title">{{ $top_data[0]["title"] }}</p>
            <p class="posted_on">{{ $top_data[0]["created_at"]->format('Y-m-d') }}</p>
            <div class="tag_list">
                @foreach($tags[0] as $tag)
                    <p class="tag">{{$tag}}</p>
                @endforeach
            </div>
            <p class="contents">{{ $top_data[0]["text"] }}</p>
            @if ($top_data[0]["movie_url"])
            @php
            // YouTubeのURLをembed用に変換
            $youtube_url =$top_data[0]["movie_url"];
            $youtubeEmbedUrl = str_replace('watch?v=', 'embed/', $youtube_url);
            @endphp
            <!-- 動画埋め込み -->
            <div class="youtube-video">
                <iframe width="80%" height="50%" src="{{ $youtubeEmbedUrl }}" frameborder="0" allowfullscreen></iframe>
            </div>
            @endif
        </article>
        <article>
            <details>
                <summary>
                    <div class="summary-content">
                        <p class="into_posted_on">{{ $top_data[1]["created_at"]->format('Y-m-d') }}</p>
                        <p class="into_title">{{ $top_data[1]["title"] }}</p>
                        <div class="arrow-down"></div>
                    </div>
                    <div class="into_tag_list">
                        @foreach($tags[1] as $tag)
                            <p class="tag">{{$tag}}</p>
                        @endforeach
                    </div>
                </summary>
                <p class="contents">{{ $top_data[1]["text"] }}</p>
            @if ($top_data[1]["movie_url"])
            @php
            // YouTubeのURLをembed用に変換
            $youtube_url =$top_data[1]["movie_url"];
            $youtubeEmbedUrl = str_replace('watch?v=', 'embed/', $youtube_url);
            @endphp
            <!-- 動画埋め込み -->
            <div class="youtube-video">
                <iframe width="80%" height="50%" src="{{ $youtubeEmbedUrl }}" frameborder="0" allowfullscreen></iframe>
            </div>
            @endif
            </details>
        </article>
        <article>
            <details>
                <summary>
                    <div class="summary-content">
                        <p class="into_posted_on">{{ $top_data[2]["created_at"]->format('Y-m-d') }}</p>
                        <p class="into_title">{{ $top_data[2]["title"] }}</p>
                        <div class="arrow-down"></div>
                    </div>
                    <div class="into_tag_list">
                        @foreach($tags[2] as $tag)
                            <p class="tag">{{$tag}}</p>
                        @endforeach
                    </div>
                </summary>
                <p class="contents">{{ $top_data[2]["text"] }}</p>
            @if ($top_data[2]["movie_url"])
            @php
            // YouTubeのURLをembed用に変換
            $youtube_url =$top_data[2]["movie_url"];
            $youtubeEmbedUrl = str_replace('watch?v=', 'embed/', $youtube_url);
            @endphp
            <!-- 動画埋め込み -->
            <div class="youtube-video">
                <iframe width="80%" height="50%" src="{{ $youtubeEmbedUrl }}" frameborder="0" allowfullscreen></iframe>
            </div>
            @endif
            </details>
        </article>
        <a href="{{route('article.index')}}" class="btn btn-solid">他の記事はこちら</a>
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
