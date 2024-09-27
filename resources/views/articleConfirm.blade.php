<link rel="stylesheet" href="/css/reset.css">
<link rel="stylesheet" href="/css/article_confirm.css">
<!-- 確認画面 (confirm.blade.php) -->
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
  <p class="page_title">投稿記事確認</p>
  <div class="confirm">
    <form action="{{ route('article.add') }}" method="POST">
      @csrf
      <!-- タイトル確認 -->
      <div class="form-group">
        <p class="title">{{ $title }}</p>
        <input type="hidden" name="title" value="{{ $title }}">
      </div>
      <!-- タグ確認 -->
      <div class="form-group">
        <ul class="tag-group">
          @foreach ($tags as $tag)
          <li>{{ $tag->name }}</li>
          @endforeach
        </ul>
        @foreach ($tag_ids as $tag_id)
        <input type="hidden" name="tags[]" value="{{ $tag_id }}">
        @endforeach
      </div>

      @if ($youtube_url)
      <input type="hidden" name="youtube_url" value="{{ $youtube_url }}">
      @php
      // YouTubeのURLをembed用に変換
      $youtubeEmbedUrl = str_replace('watch?v=', 'embed/', $youtube_url);
      @endphp

      <!-- 動画埋め込み -->
      <div class="youtube-video">
        <iframe width="80%" height="50%" src="{{ $youtubeEmbedUrl }}" frameborder="0" allowfullscreen></iframe>
      </div>
      @endif
      <!-- 内容確認 -->
      <div class="form-group">
        <p class="content">{{ $content }}</p>
        <input type="hidden" name="content" value="{{ $content }}">
      </div>
  </div>
    <!-- 投稿ボタン -->
  <div class="button">
    <a href="{{route('articleCreate')}}" class="btn btn-return"><p>投稿画面に戻る</p></a>
    <button type="submit" class="btn btn-success"><p>この記事を投稿する</p></button>
  </div>
  </form>
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
