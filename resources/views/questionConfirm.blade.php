<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/reset.css">
    <link rel="stylesheet" href="/css/question_confirm.css">
    <title>Document</title>
</head>
<body>
  <main>
    <form action="{{ route('question.add') }}" method="POST">
      @csrf
      <div class="form-group">
        <label for="title">タイトル</label>
        <p>{{ $title }}</p>
        <input type="hidden" name="title" value="{{ $title }}">
      </div>

      <div class="form-group">
        <label for="text">内容</label>
        <p>{{ $text }}</p>
        <input type="hidden" name="text" value="{{ $text }}">
      </div>

      <div class="form-group">
        <label for="tags">タグ</label>
        <ul>
          @foreach ($tags as $tag)
          <li>{{ $tag->name }}</li>
          @endforeach
        </ul>
        @foreach ($tag_ids as $tag_id)
        <input type="hidden" name="tags[]" value="{{ $tag_id }}">
        @endforeach
      </div>

      
      <button type="submit" class="btn btn-success">この知恵袋を投稿する</button>

    </form>
  </main>
</body>
</html>
