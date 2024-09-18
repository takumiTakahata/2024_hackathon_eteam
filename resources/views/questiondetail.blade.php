<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/reset.css">
    <link rel="stylesheet" href="/css/question_detail.css">
    <title>知恵袋詳細</title>
</head>
<body>
    <main>
        <p class="page_title">知恵袋詳細</p>
        <div class="question">
            <p class="title">{{ $question->title }}</p>
            <ul class="tag_group">
                @forelse ($question->tags as $tag)
                <li>{{ $tag->name }}</li>
                @empty
                <li>タグはありません</li>
                @endforelse
            </ul>
            <p class="content">{{ $question->text }}</p>
        </div>
        <form action="{{ route('answer.store', $question->id) }}" method="POST">
            @csrf
            <textarea name="text" rows="2" cols="50" required placeholder="コメントを入力"></textarea>
            <button type="submit" class="btn btn-comment">コメントを投稿する</button>
        </form>

        <p class="comment_list">コメント一覧</p>
        @foreach ($question->answer as $answer)
        <div>
            <p class="comment">{{ $answer->text}}</p>
        </div>
        @endforeach
    </main>
</body>
</html>
