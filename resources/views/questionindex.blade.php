
        <!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/reset.css">
    <link rel="stylesheet" href="/css/list.css">
    <title>知恵袋一覧</title>
</head>
<body>
    <main>

        <h1>知恵袋一覧</h1>

        <div class="tag-buttons">
            <form id="tag-filter-form" method="GET" action="{{ route('question.index') }}">
                @foreach ($tags as $tag)
                    <label class="tag-checkbox">
                        <input type="checkbox" name="tag_ids[]" value="{{ $tag->id }}"
                            {{ is_array(request()->input('tag_ids')) && in_array($tag->id, request()->input('tag_ids')) ? 'checked' : '' }}
                            onchange="this.form.submit()">
                        <span>{{ $tag->name }}</span>
                    </label>
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

        <!-- ページネーションリンク -->
        {{ $questions->links() }}
    </main>
</body>
</html>
