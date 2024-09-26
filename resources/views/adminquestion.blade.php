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
        <footer>
            <ul>
                <li class="foot"><img src="/image/知恵袋一覧アイコン.png"><a href="{{route('adminquestion.index')}}">知恵袋<br>削除</a></li>
                <li class="foot2"><img src="/image/Line.png"></li>
                <li class="foot"><img src="/image/記事一覧アイコン.png"><a href="{{route('adminarticle.index')}}">記事<br>削除</a></li>
            </ul>
        </footer>
        @empty
        <p>知恵袋がありません。</p>
        @endforelse
        <!-- ページネーションリンク -->
        {{ $questions->appends(request()->except('page'))->links() }}
    </main>
</body>

</html>
