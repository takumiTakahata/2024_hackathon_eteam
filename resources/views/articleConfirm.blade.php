<!-- 確認画面 (confirm.blade.php) -->
<form action="{{ route('article.add') }}" method="POST">
  @csrf
  <!-- タイトル確認 -->
  <div class="form-group">
    <label for="title">タイトル</label>
    <p>{{ $title }}</p>
    <input type="hidden" name="title" value="{{ $title }}">
  </div>

  <!-- 内容確認 -->
  <div class="form-group">
    <label for="content">内容</label>
    <p>{{ $content }}</p>
    <input type="hidden" name="content" value="{{ $content }}">
  </div>

  <!-- タグ確認 -->
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

  <!-- 投稿ボタン -->
  <button type="submit" class="btn btn-success">この記事を投稿する</button>

</form>
