<link rel="stylesheet" href="/css/reset.css">
<link rel="stylesheet" href="/css/question_confirm.css">
<header>
  <a href="{{route('index')}}">アプリ名</a>
        @auth
            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
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
    <p class="page_title">知恵袋確認</p>
    <div class="confirm">
      <form action="{{ route('question.add') }}" method="POST">
        @csrf
          <p class="title">{{ $title }}</p>
          <input type="hidden" name="title" value="{{ $title }}">
          <ul class="tag-group">
            @foreach ($tags as $tag)
            <li>{{ $tag->name }}</li>
            @endforeach
          </ul>
          @foreach ($tag_ids as $tag_id)
          <input type="hidden" name="tags[]" value="{{ $tag_id }}">
          @endforeach
          <p class="content">{{ $text }}</p>
          <input type="hidden" name="text" value="{{ $text }}">
    </div>
      <div class="button">
        <a href="{{route('qestionCreate')}}" class="btn btn-return"><p>投稿画面に戻る</p></a>
        <button type="submit" class="btn btn-success"><p>この知恵袋を投稿する</p></button>
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
