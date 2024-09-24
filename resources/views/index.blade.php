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
<<<<<<< HEAD
        <p class="recommendation">おすすめの一人暮らし</p>
        <p class="recommendation">テクニックの記事</p>
        <article>
            <p class="title">記事タイトル1</p>
            <p class="posted_on">投稿日</p>
            <div class="tag_list">
                <p class="tag">タグ</p>
                <p class="tag">タグ</p>
                <p class="tag">タグ</p>
            </div>
            <p class="contents">aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</p>
            <video controls width="250">
                <source src="" type="video/webm"/>
            </video> 
=======
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
>>>>>>> main
        </article>
        <article>
            <details>
                <summary>
<<<<<<< HEAD
                    <p class="title">記事タイトル1</p>
                    <p class="posted_on">投稿日</p>
                    <div class="tag_list">
                        <p class="tag">タグ</p>
                        <p class="tag">タグ</p>
                        <p class="tag">タグ</p>
                    </div>
                </summary>
                <p>aaaaaaaaaaa</p>
            </details>
        </article>
                <article>
            <details>
                <summary>
                    <p class="title">記事タイトル1</p>
                    <p class="posted_on">投稿日</p>
                    <div class="tag_list">
                        <p class="tag">タグ</p>
                        <p class="tag">タグ</p>
                        <p class="tag">タグ</p>
                    </div>
                </summary>
                <p>aaaaaaaaaaa</p>
            </details>
        </article>
        <p class="recommendation">おすすめの一人暮らしの</p>
        <p class="recommendation">悩みを解決する記事</p>
        <article>
            <p class="title">記事タイトル2</p>
            <p class="posted_on">投稿日</p>
            <div class="tag_list">
                <p class="tag">タグ</p>
                <p class="tag">タグ</p>
                <p class="tag">タグ</p>
            </div>
            <p class="contents">記事内容2</p>
            <video controls width="250">
                <source src="" type="video/webm"/>
            </video> 
        </article>
    </main>
    <footer>
        <a href="">知恵袋投稿</a>
        <a href="">投稿記事</a>
        <a href="">知恵袋一覧</a>
        <a href="">記事一覧</a>
=======
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
        <a href="{{route('qestionCreate')}}">知恵袋投稿</a>
        <a href="{{route('articleCreate')}}">投稿記事</a>
        <a href="{{route('question.index')}}">知恵袋一覧</a>
        <a href="{{route('article.index')}}">記事一覧</a>
>>>>>>> main
    </footer>
</body>
</html>
