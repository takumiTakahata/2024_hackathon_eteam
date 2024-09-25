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
        <a href="{{route('index')}}">アプリ名</a>
        <a href="{{route('login')}}"><p>ログイン</p>
    </header>
    <main>
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
