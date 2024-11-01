<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/reset.css">
    <link rel="stylesheet" href="/css/question_detail.css">
    <title>知恵袋詳細</title>
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
        <p class="page_title">知恵袋詳細</p>
        <div class="question">
            <p class="title">{{ $question->title }}</p>
            <ul class="tag_group">
                @forelse ($question->tags as $tag)
                <li>{{ $tag->name }}</li>
                @empty
                <li>タグはありません</li>
                @endforelse
            </ul>
            <p class="content">{{ $question->text }}</p>
        </div>
        <a href="{{route('question.index')}}" class="question_return">＜　知恵袋一覧へ戻る</a>
        <form action="{{ route('answer.store', $question->id) }}" method="POST">
            @csrf
            <textarea name="text" rows="2" cols="50" required placeholder="コメントを入力"></textarea>
            <button type="submit" class="btn btn-comment">コメントを投稿する</button>
        </form>

        <p class="comment_list">コメント一覧</p>
        @foreach ($question->answer as $answer)
        <div>
            <p class="comment">{{ $answer->text}}</p>
        </div>
        @endforeach
    </main>
    <footer>
    <ul>
      <li class="foot"><a href="{{route('qestionCreate')}}"><img src="/image/知恵袋アイコン.png"><p>知恵袋投稿</p></a></li>
      <li class="foot2"><img src="/image/Line.png"></li>
      <li class="foot"><a href="{{route('articleCreate')}}"><img src="/image/記事アイコン.png"><p>記事投稿</p></a></li>
      <li class="foot2"><img src="/image/Line.png"></li>
      <li class="foot"><a href="{{route('question.index')}}"><img src="/image/知恵袋一覧アイコン.png"><p>知恵袋一覧</p></a></li>
      <li class="foot2"><img src="/image/Line.png"></li>
      <li class="foot"><a href="{{route('article.index')}}"><img src="/image/記事一覧アイコン.png"><p>記事一覧</p></a></li>
    </ul>
  </footer>
  <script src="/js/logout.js"></script>
</body>
</html>
