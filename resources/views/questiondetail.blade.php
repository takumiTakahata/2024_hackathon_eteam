<!-- resources/views/questiondetail.blade.php -->
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>質問詳細</title>
</head>
<body>
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
    <form action="{{ route('comment.store', $question->id) }}" method="POST">
        @csrf
        <textarea name="content" rows="4" cols="50" required></textarea>
        <button type="submit">Add Comment</button>
    </form>
</body>
</html>
