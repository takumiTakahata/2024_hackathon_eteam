<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="/css/reset.css">
  <link rel="stylesheet" href="/css/add.css">
  <title>Document</title>
</head>
<body>
  <main>
    <p class="page_title">記事の投稿</p>
    <form action="{{route('article.comfirm')}}" method="POST">
      @csrf
      <!-- タイトル入力 -->
       <div class="article_title">
        <p class="title">➤記事タイトル</p>
        <p class="caveat">必須</p>
      </div>
        <input type="text" class="title_form" id="title" name="title" placeholder="タイトルを入力してください" required>

      <!-- タグ選択（複数可） -->
      <label for="tags">➤分類タグ</label>
      <div class="tags_list">
        @foreach ($tags as $tag)
          <input type="checkbox" class="tags_form" id="tag{{ $tag->id }}" name="tags[]" value="{{ $tag->id }}">
          <label class="check_label" for="tag{{ $tag->id }}">{{ $tag->name }}</label>
        @endforeach
      </div>

      <!-- 内容入力 -->
      <div class="form-group">
        <label for="content">投稿内容</label>
        <textarea class="form-control" id="content" name="content" rows="5" placeholder="内容を入力してください" required></textarea>
      </div>

      <label for="youtube_url">YouTube動画URL:</label>
      <input type="url" name="youtube_url" id="youtube_url" placeholder="https://www.youtube.com/watch?v=xxxxx">

      <!-- 送信ボタン -->
      <button type="submit" class="btn btn-primary">投稿</button>
    </form>
  </main>
</body>
</html>
