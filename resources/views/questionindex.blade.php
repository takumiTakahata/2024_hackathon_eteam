<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
@extends('layouts.app')

@section('content')
    <h1>知恵袋一覧</h1>

    <table>
        <thead>
            <tr>
                <th>タイトル</th>
                <th>内容</th>
                <th>タグ</th>
                <th>投稿日</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($question as $question)
    <div>
        <h2>{{ $question->title }}</h2>
        <p>{{ $question->text }}</p>

        <ul>
            @foreach ($question->tags as $tag)
                <li>{{ $tag->name }}</li>
            @endforeach
        </ul>
    </div>
@endforeach
        </tbody>
    </table>

    <!-- ページネーションのリンク -->
    {{ $question->links() }}
@endsection

</body>
</html>