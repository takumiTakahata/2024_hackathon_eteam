
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>質問詳細</title>
</head>
<body>
    <p>{{$question}}</p>
    <h1>質問詳細</h1>

    <div>
        <h2>{{ $question->title }}</h2>
        <p>{{ $question->text }}</p>

        <h3>関連タグ</h3>
        <ul>
            @forelse ($question->tags as $tag)
                <li>{{ $tag->name }}</li>
            @empty
                <li>タグはありません</li>
            @endforelse
        </ul>
    </div>

    <h2>コメント</h2>
    <form action="{{ route('answer.store', $question->id) }}" method="POST">
        @csrf
        <textarea name="text" rows="4" cols="50" required></textarea>
        <button type="submit">コメントを投稿する</button>
    </form>

    <h3>コメント一覧</h3>
    @foreach ($question->answer as $answer)
    <div>
        <p>{{ $answer->text}}</p>
    </div>
    @endforeach
</body>
</html>
