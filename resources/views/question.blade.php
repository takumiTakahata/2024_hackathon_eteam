<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1>知恵袋の投稿</h1>
<form action="{{route('question.Confirm')}}" method="POST">
  @csrf
  <div class="form-group">
    <label for="title">記事タイトル</label>
    <input type="text" class="form-control" id="title" name="title" placeholder="タイトルを入力してください" required>
  </div>

  <div class="form-group">
    <label for="tags">分類タグ</label>
    <div>
      @foreach ($tags as $tag)
      <div class="form-check">
        <input type="checkbox" class="form-check-input" id="tag{{ $tag->id }}" name="tags[]" value="{{ $tag->id }}">
        <label class="form-check-label" for="tag{{ $tag->id }}">{{ $tag->name }}</label>
      </div>
      @endforeach
    </div>
  </div>

  <div class="form-group">
    <label for="text">投稿内容</label>
    <textarea class="form-control" id="text" name="text" rows="5" placeholder="内容を入力してください" required></textarea>
  </div>

  <button type="submit" class="btn btn-primary">投稿</button>
</form>
    
</body>
</html>