<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>知恵袋一覧</title>
    <style>
        /* ページネーションの矢印を完全に隠す */
        .pagination .page-item.disabled .page-link::before,
        .pagination .page-item.next .page-link::before,
        .pagination .page-item.prev .page-link::before {
            display: none; /* 矢印アイコンを完全に非表示にする */
        }

        /* ページネーションの矢印用のリンク要素を完全に削除する */
        .pagination .page-item.disabled .page-link,
        .pagination .page-item.next .page-link,
        .pagination .page-item.prev .page-link {
            visibility: hidden; /* 矢印リンク自体を非表示にする */
        }
    </style>
</head>
<body>

    <h1>知恵袋一覧</h1>

    <div class="tag-buttons">
        <form method="GET" action="{{ route('question.index') }}">
            @foreach ($tags as $tag)
                <button type="submit" name="tag_id" value="{{ $tag->id }}">
                    {{ $tag->name }}
                </button>
            @endforeach
        </form>
    </div>

    <table>
        <thead>
            <tr>
                <th>タイトル</th>
                <th>内容</th>
                <th>タグ</th>
                <th>投稿日</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($questions as $question)
                <tr>
                    <td>{{ $question->title }}</td>
                    <td>{{ $question->text }}</td>
                    <td>
                        <ul>
                            @foreach ($question->tags as $tag)
                                <li>{{ $tag->name }}</li>
                            @endforeach
                        </ul>
                    </td>
                    <td>{{ $question->created_at->format('Y-m-d') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $questions->links() }}

</body>
</html>
