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
    <header>
        <a href="{{route('index')}}">カジの輪</a>
        @auth
            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit(); logout();">
                <p>ログアウト</p>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        @else
            <a href="{{ route('login') }}"><p>ログイン</p></a>
        @endauth
    </header>
  <main>
    @if (session('status'))
      <script>
        window.flashMessage = '{{ session('status') }}';
      </script>
    @endif
    <p class="page_title">記事の投稿</p>
    <form action="{{route('article.comfirm')}}" method="POST">
      @csrf
      <!-- タイトル入力 -->
      <div class="heading">
        <p class="title">➤記事タイトル</p>
        <p class="caveat">必須</p>
      </div>
      <input type="text" class="title_form" id="title" name="title" placeholder="タイトルを入力してください" required>

      <!-- タグ選択（複数可） -->
      <div class="heading">
        <label for="tags" class="title">➤分類タグ</label>
        <p class="caveat">必須</p>
      </div>
      <div class="tags_list">
        @foreach ($tags as $tag)
        <input type="checkbox" class="tags_form" id="tag{{ $tag->id }}" name="tags[]" value="{{ $tag->id }}">
        <label class="check_label" for="tag{{ $tag->id }}">{{ $tag->name }}</label>
        @endforeach
      </div>

      <!-- 内容入力 -->
      <div class="form-group">
        <div class="heading">
          <label for="content" class="title">➤投稿内容</label>
          <p class="caveat">必須</p>
        </div>
        <textarea class="form-control" id="content" name="content" rows="5" placeholder="内容を入力してください" required></textarea>
      </div>
      <div class="heading">
        <label for="youtube_url" class="title">➤投稿動画</label>
        <p class="any">(任意)</p>
      </div>
      <input type="url" name="youtube_url" id="youtube_url" placeholder="https://www.youtube.com/watch?v=xxxxx">

      <!-- 送信ボタン -->
      <div>
        <button type="submit" class="btn btn-primary">確認画面へ進む</button>
      </div>
    </form>
  </main>
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
  <script src="/js/logout.js"></script>
</body>

</html>
