<h1>記事の投稿</h1>
<div class="container">
    <h2>記事を投稿する</h2>
    
    <!-- エラーメッセージの表示 -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- 記事投稿フォーム -->
    <form action="{{ route('articles.store') }}" method="POST">
        @csrf

        <!-- 記事タイトル -->
        <div class="form-group">
            <label for="title">タイトル</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}" required>
        </div>

        <!-- タグ (複数選択) -->
        <!-- <div class="form-group">
            <label for="tags">タグ</label>
            <select class="form-control" id="tags" name="tags[]" multiple>
                @foreach($tags as $tag)
                    <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                @endforeach
            </select>
        </div> -->

        <!-- 投稿内容 -->
        <div class="form-group">
            <label for="content">投稿内容</label>
            <textarea class="form-control" id="content" name="content" rows="8" required>{{ old('content') }}</textarea>
        </div>

        <!-- 送信ボタン -->
        <button type="submit" class="btn btn-primary">投稿する</button>
    </form>
</div>
