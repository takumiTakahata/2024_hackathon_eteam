<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/reset.css">
    <link rel="stylesheet" href="/css/list.css">
    <title>記事一覧</title>
</head>
<body>
    <main>
        <p class="page_title">記事一覧</p>
        <div class="tag-buttons">
            <form id="tag-filter-form" method="GET" action="{{ route('article.index') }}">
                @foreach ($tags as $tag)
                    <label class="tag-checkbox">
                        <input type="checkbox" name="tag_ids[]" value="{{ $tag->id }}"
                            {{ is_array(request()->input('tag_ids')) && in_array($tag->id, request()->input('tag_ids')) ? 'checked' : '' }}
                            onchange="this.form.submit()">
                        <span>{{ $tag->name }}</span>
                    </label>
                @endforeach
            </form>
        </div>
        @forelse ($articles as $article)
            <div class="lists">
                <div class="page">
                    <p class="posted_on">{{ $article->created_at->format('Y-m-d') }}</p>
                    <a href="{{ route('articleAll', $article->id) }}"  class="title">{{ $article->title }}</a>
                    <a href="{{ route('articleAll', $article->id) }}" class="link">></a>
                </div>
                <ul class="tags">
                    @foreach ($article->tags as $tag)
                        <li class="tag">{{ $tag->name }}</li>
                    @endforeach
                </ul>
            </div>
        @empty
            <p>記事がありません。</p>
        @endforelse
        <!-- ページネーションリンク -->
        {{ $articles->appends(request()->except('page'))->links('pagination.custom') }}
    </main>
    <footer>
        <a href="{{route('qestionCreate')}}">知恵袋投稿</a>
        <a href="{{route('articleCreate')}}">投稿記事</a>
        <a href="{{route('question.index')}}">知恵袋一覧</a>
        <a href="{{route('article.index')}}">記事一覧</a>
    </footer>
</body>
</html>
