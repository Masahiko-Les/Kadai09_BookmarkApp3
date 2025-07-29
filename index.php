<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ブックマークアプリ - データ登録</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    
    <!-- ヘッダー -->
    <?php include("header.php"); ?>

    <!-- メインコンテンツ -->
    <div class="login-container">
    <h1>📚 ブックマークアプリ</h1>
    <p class="form-subtitle">本を登録してください</p>

    <form method="POST" action="insert.php">
        <label for="bookname">書籍名</label>
        <input type="text" name="book_title" id="bookname" placeholder="例：レ・ミゼラブル" required>

        <label for="bookurl">書籍のURL</label>
        <input type="text" name="book_url" id="bookurl" placeholder="例：http://example.com" required>

        <label for="comment">書籍コメント</label>
        <textarea name="comment" id="comment" rows="4" placeholder="書籍についてのコメントをお書きください…" required></textarea>

        <input type="submit" value="📤 登録する">
    </form>
    </div>

</body>

</html>