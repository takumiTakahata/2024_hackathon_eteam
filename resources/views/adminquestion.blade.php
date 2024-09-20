<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>知恵袋一覧</title>
    <style>
        /* チェックボックスを隠し、テキスト部分をスタイリング */
        .tag-checkbox input[type="checkbox"] {
            display: none;
        }

        .tag-checkbox span {
            cursor: pointer;
            padding: 5px 10px;
            border: 1px solid #ccc;
            margin: 5px;
            display: inline-block;
            border-radius: 5px;
        }

        .tag-checkbox input[type="checkbox"]:checked + span {
            background-color: #007BFF;
            color: #fff;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
        }

        th {
            background-color: #f4f4f4;
        }

        .delete-button {
            color: red;
            cursor: pointer;
            border: none;
            background: none;
        }
    </style>
</head>
<body>

    <h1>知恵袋一覧</h1>

    <div class="tag-buttons">
        <form id="tag-filter-form" method="GET" action="{{ route('question.delete') }}">
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
                <th>削除</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($questions as $question)
                <tr>
                    <td>{{ $question->title }}</td>
                    <td>{{ $question->content }}</td>
                    <td>
                        <ul>
                            @foreach ($question->tags as $tag)
                                <li>{{ $tag->name }}</li>
                            @endforeach
                        </ul>
                    </td>
                    <td>{{ $question->created_at->format('Y-m-d') }}</td>
                    <td>
                        <form action="{{ route('question.delete', $question->id) }}" method="POST" onsubmit="return confirm('本当に削除しますか？');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="delete-button">削除</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5">知恵袋がありません。</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    {{ $questions->appends(request()->except('page'))->links() }}

</body>
</html>
