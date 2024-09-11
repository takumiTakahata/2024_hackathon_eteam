<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>知恵袋投稿ページ</title>
</head>
<body>
    <div class="container">
        <h1>知恵袋投稿ページ</h1>

        <form action="{{ route('question.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="title">▶ 知恵袋タイトル</label>
                <input type="text" id="title" name="title" value="{{ old('title') }}" class="form-control" required>
            </div>

            <div class="form-group">
                <label>▶ 分類タグ</label>
                @foreach ($Tags as $tag)
                    <div class="form-check">
                        <input type="checkbox" id="tag_{{ $tag->id }}" name="tags[]" value="{{ $tag->id }}" class="form-check-input">
                        <label for="tag_{{ $tag->id }}" class="form-check-label">{{ $tag->name }}</label>
                    </div>
                @endforeach
            </div>

            <div class="form-group">
                <label for="content">▶ 投稿内容</label>
                <textarea id="content" name="content" rows="5" class="form-control" required>{{ old('content') }}</textarea>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary">投稿する</button>
            </div>
        </form>
    </div>
</body>
</html>
