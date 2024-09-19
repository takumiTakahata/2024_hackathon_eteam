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
            <p class="posted_on">{{ $top_data[0]["created_at"] }}</p>
            <div class="tag_list">
                @foreach($tags[0] as $tag)
                    <p class="tag">{{$tag}}</p>
                @endforeach
            </div>
            <p class="contents">{{ $top_data[0]["text"] }}</p>
            <video controls width="250">
                <source src="" type="video/webm"/>
            </video> 
        </article>
        <article>
            <details>
                <summary>
                    <div class="summary-content">
                        <p class="into_posted_on">{{ $top_data[1]["created_at"] }}</p>
                        <p class="into_title">{{ $top_data[1]["title"] }}</p>
                        <div class="arrow-down"></div>
                    </div>
                    <div class="into_tag_list">
                        @foreach($tags[1] as $tag)
                            <p class="tag">{{$tag}}</p>
                        @endforeach
                    </div>
                </summary>
                <video controls width="250">
                    <source src="" type="video/webm"/>
                </video> 
                <p class="contents">{{ $top_data[1]["text"] }}</p>
            </details>
        </article>
        <article>
            <details>
                <summary>
                    <div class="summary-content">
                        <p class="into_posted_on">{{ $top_data[2]["created_at"] }}</p>
                        <p class="into_title">{{ $top_data[2]["title"] }}</p>
                        <div class="arrow-down"></div>
                    </div>
                    <div class="into_tag_list">
                        @foreach($tags[2] as $tag)
                            <p class="tag">{{$tag}}</p>
                        @endforeach
                    </div>
                </summary>
                <video controls width="250">
                    <source src="" type="video/webm"/>
                </video> 
                <p class="contents">{{ $top_data[2]["text"] }}</p>
            </details>
        </article>
    </main>
    <footer>
        <a href="">知恵袋投稿</a>
        <a href="">投稿記事</a>
        <a href="">知恵袋一覧</a>
        <a href="">記事一覧</a>
    </footer>
</body>
</html>
