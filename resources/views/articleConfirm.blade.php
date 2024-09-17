<link rel="stylesheet" href="/css/reset.css">
<link rel="stylesheet" href="/css/article_confirm.css">
<!-- 確認画面 (confirm.blade.php) -->
 <header>

 </header>
 <main>
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
    <button type="submit" class="btn btn-success"><p>この記事を投稿する</p></button>
    <button><a href="" class="btn btn-return"><p>投稿画面に戻る</p></a></button>

  </form>
</main>
<footer>
  
</footer>
