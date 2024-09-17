<link rel="stylesheet" href="/css/reset.css">
<link rel="stylesheet" href="/css/question_confirm.css">
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
        <button type="submit" class="btn btn-success"><p>この知恵袋を投稿する</p></button>
        <button><a href="" class="btn btn-return"><p>投稿画面に戻る</p></a></button>
      </div>
      </form>
  </main>
