<link rel="stylesheet" href="/css/reset.css">
<link rel="stylesheet" href="/css/article_confirm.css">
<!-- 確認画面 (confirm.blade.php) -->
 <main>
  <div class="confirm">
  <form action="{{ route('article.add') }}" method="POST">
    @csrf
    <!-- タイトル確認 -->
    <div class="form-group">
      <label for="title">タイトル</label>
      <p class="title">{{ $title }}</p>
      <input type="hidden" name="title" value="{{ $title }}">
    </div>

    <!-- 内容確認 -->
    <div class="form-group">
      <label for="content">内容</label>
      <p class="content">{{ $content }}</p>
      <input type="hidden" name="content" value="{{ $content }}">
    </div>

    <!-- タグ確認 -->
    <div class="form-group">
      <label for="tags">タグ</label>
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
      <iframe width="560" height="315" src="{{ $youtubeEmbedUrl }}" frameborder="0" allowfullscreen></iframe>
    </div>
    @endif

    <div>
    <!-- 投稿ボタン -->
    <button type="submit" class="btn btn-success">この記事を投稿する</button>

  </form>
</main>
