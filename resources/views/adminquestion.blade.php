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
                <a href="{{ route('question.delete',$question->id) }}" class="btn btn-danger">削除</a>
            </article>
        @empty
            <p>知恵袋がありません。</p>
        @endforelse
        <!-- ページネーションリンク -->
         {{ $questions->appends(request()->except('page'))->links() }}
    </main>
</body>
</html>
