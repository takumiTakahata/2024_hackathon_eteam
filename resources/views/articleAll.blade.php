<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/reset.css">
    <link rel="stylesheet" href="/css/top.css">
    <title>Document</title>
</head>
<body>
    <p>{{ $article -> title}}</p>
    <p>{{ $article -> text}}</p>
    <p>{{ $article -> popular}}</p>
    <p>{{ $article -> movie_url}}</p>
    <p>{{ $article -> created_at}}</p>

    <p>{{ $article_tag }}</p>
</body>
</html>
