<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="" >
</head>
<body>
    <header></header>
    <main>
        <h1>以下の要素に必要情報を入力して下さい</h1>
        <div class="top">
        <div class="titles">
            <h2>▶記事タイトル<span class="span_two">(20文字まで)</span></h2>
            <input type="text" class="title">
        </div>

        <div class="radio-group">
            <h2>▶分類タグ<span class="span_two">(複数選択可)</span></h2>
            <label class="custom-radio">
                <input type="radio" name="tag" value="洗濯">
                <span class="radio-text">洗濯</span>
            </label>
    
            <label class="custom-radio">
                <input type="radio" name="tag" value="洗い物">
                <span class="radio-text">洗い物</span>
            </label>
    
            <label class="custom-radio">
                <input type="radio" name="tag" value="掃除">
                <span class="radio-text">掃除</span>
            </label>
        </div>

        <div class="titles">
            <h2>▶投稿内容<span class="span_two">(20文字まで)</span></h2>
            <input type="text" class="title">
        </div>

        <div class="url">
            <h2>▶投稿動画<span class="span_two">(任意)</span></h2>
            <input type="text" class="you"  placeholder="URL">
        </div>

        <input type="button" class="button" value="確認画面に進む">
    </div>
    </main>
    <footer>
        <ul>
            <li class="foot"><a href=""><img src="{{ asset('../../../../public/image/知恵袋アイコン.png') }}" >知恵袋<br>投稿</a></li>
            <li class="foot2"><img src=""></li>
            <li class="foot"><a href=""><img src="{{ asset('../../../../public/image/記事アイコン.png }}" >記事<br>投稿</a></li>
            <li class="foot2"><img src=""></li>
            <li class="foot"><a href=""><img src="{{ asset('../../../../public/image/知恵袋一覧アイコン.png }}" >知恵袋<br>一覧</a></li>
            <li class="foot2"><img src=""></li>
            <li class="foot"><a href=""><img src="{{ asset('../../../../public/image/記事一覧アイコン.png }}" >記事<br>一覧</a></li>   
        </ul>
    </footer>
</body>
</html>