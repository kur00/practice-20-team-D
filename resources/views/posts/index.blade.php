<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>掲示板</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        .container { max-width: 600px; margin: auto; }
        .post { border-bottom: 1px solid #ddd; padding: 10px 0; }
        .success { color: green; }
    </style>
</head>
<body>
    <div class="container">
        <h2>掲示板</h2>

        @if(session('success'))
            <p class="success">{{ session('success') }}</p>
        @endif

        <!-- 投稿フォーム -->
        <form action="{{ route('posts.store') }}" method="POST">
            @csrf
            <input type="text" name="title" placeholder="タイトル" required><br>
            <textarea name="content" placeholder="投稿内容" required></textarea><br>
            <button type="submit">投稿する</button>
        </form>

        <hr>

        <!-- 投稿一覧 -->
        @foreach($posts as $post)
            <div class="post">
                <h3>{{ $post->title }}</h3>
                <p>{{ $post->content }}</p>
                <form action="{{ route('posts.destroy', $post) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit">削除</button>
                </form>
            </div>
        @endforeach
    </div>
</body>
</html>