<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>投稿内容の表示</title>
</head>
<body>
    <div class="container">
        <h1>投稿内容の表示</h1>

        <div class="question">
            <h2>知恵袋タイトル</h2>
            <p>{{ $question->title }}</p>

            <h2>分類タグ</h2>
            <ul>
                @foreach ($question->tags as $tag)
                    <li>{{ $tag->name }}</li>
                @endforeach
            </ul>

            <h2>投稿内容</h2>
            <p>{{ $question->content }}</p>
        </div>

        <a href="{{ url()->previous() }}">戻る</a>
    </div>
</body>
</html>
