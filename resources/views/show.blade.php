<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
  <header>
    <a href="{{route('index')}}">アプリ名</a>
    <a href="{{route('login')}}"><p>ログイン</p></a>
  </header>
<form action="{{ route('question.add') }}" method="POST">
  @csrf
  <div class="form-group">
    <label for="title">タイトル</label>
    <p>{{ $title }}</p>
    <input type="hidden" name="title" value="{{ $title }}">
  </div>

  <div class="form-group">
    <label for="content">内容</label>
    <p>{{ $content }}</p>
    <input type="hidden" name="content" value="{{ $content }}">
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
<footer>
    <ul>
      <li class="foot"><img src="/image/知恵袋アイコン.png"><a href="{{route('qestionCreate')}}"><p>知恵袋</p><p>投稿</p></a></li>
      <li class="foot2"><img src="/image/Line.png"></li>
      <li class="foot"><img src="/image/記事アイコン.png"><a href="{{route('articleCreate')}}"><p>記事</p><p>投稿</p></a></li>
      <li class="foot2"><img src="/image/Line.png"></li>
      <li class="foot"><img src="/image/知恵袋一覧アイコン.png"><a href="{{route('question.index')}}"><p>知恵袋</p><p>一覧</p></a></li>
      <li class="foot2"><img src="/image/Line.png"></li>
      <li class="foot"><img src="/image/記事一覧アイコン.png"><a href="{{route('article.index')}}"><p>記事</p><p>一覧</p></a></li>
    </ul>
  </footer>
</body>
</html>
