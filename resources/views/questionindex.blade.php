<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/reset.css">
    <link rel="stylesheet" href="/css/list.css">
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
    </style>
</head>
<body>
    <main>

        <p class="page_title">知恵袋一覧</p>

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
        @foreach ($questions as $question)
            <div class="lists">
                <div class="page">
                    <p class="posted_on">{{ $question->created_at->format('Y-m-d') }}</p>
                    <a href="question/{{$question->id}}"  class="title">{{ $question->title }}</a>
                    <a href="question/{{$question->id}}" class="link">></a>
                </div>
                <ul class="tags">
                    @foreach ($question->tags as $tag)
                        <li class="tag">{{ $tag->name }}</li>
                    @endforeach
                </ul>
            </div>
        @endforeach

        <!-- ページネーションリンク -->
        
    {{ $questions->appends(request()->except('page'))->links() }}
    </main>
</body>
</html>
