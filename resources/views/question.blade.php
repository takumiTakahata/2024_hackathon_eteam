<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>知恵袋一覧</title>
    <script>
        function searchByTag(tagId) {
            // タグがクリックされたらそのIDをURLに付けてリダイレクト
            window.location.href = "?tag_id=" + tagId;
        }
    </script>
</head>
<body>

    <h1>知恵袋一覧</h1>

    <!-- タグの表示とクリックで検索 -->
    <div class="tag-buttons">
        @foreach ($tags as $tag)
            <button type="button" onclick="searchByTag({{ $tag->id }})">
                {{ $tag->name }}
            </button>
        @endforeach
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
