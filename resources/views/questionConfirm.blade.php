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
        <a href="{{route('qestionCreate')}}" class="btn btn-return"><p>投稿画面に戻る</p></a>
        <button type="submit" class="btn btn-success"><p>この知恵袋を投稿する</p></button>
      </div>
      </form>
  </main>
  <footer>
    <ul>
      <li class="foot"><img src="/image/知恵袋アイコン.png"><a href="{{route('qestionCreate')}}">知恵袋<br>投稿</a></li>
      <li class="foot2"><img src="/image/Line.png"></li>
      <li class="foot"><img src="/image/記事アイコン.png"><a href="{{route('articleCreate')}}">記事<br>投稿</a></li>
      <li class="foot2"><img src="/image/Line.png"></li>
      <li class="foot"><img src="/image/知恵袋一覧アイコン.png"><a href="{{route('question.index')}}">知恵袋<br>一覧</a></li>
      <li class="foot2"><img src="/image/Line.png"></li>
      <li class="foot"><img src="/image/記事一覧アイコン.png"><a href="{{route('article.index')}}">記事<br>一覧</a></li>
    </ul>
  </footer>
