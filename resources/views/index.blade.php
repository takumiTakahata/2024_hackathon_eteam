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
        <p>アプリ名</p>
    </header>
    <main>
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
            @if ($top_data[2]["movie_url"])
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
      <li class="foot"><img src="/image/知恵袋アイコン.png"><a href="{{route('qestionCreate')}}">知恵袋<br>投稿</a></li>
      <li class="foot2"><img src="/image/Line.png"></li>
      <li class="foot"><img src="/image/記事アイコン.png"><a href="{{route('articleCreate')}}">記事<br>投稿</a></li>
      <li class="foot2"><img src="/image/Line.png"></li>
      <li class="foot"><img src="/image/知恵袋一覧アイコン.png"><a href="{{route('question.index')}}">知恵袋<br>一覧</a></li>
      <li class="foot2"><img src="/image/Line.png"></li>
      <li class="foot"><img src="/image/記事一覧アイコン.png"><a href="{{route('article.index')}}">記事<br>一覧</a></li>
    </ul>
  </footer>
</body>
</html>
