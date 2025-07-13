<?php
require_once('funcs.php');

// GETでidを取得
$id = $_GET['id'];

// DB接続
$pdo = db_conn();

// SELECT
$sql = 'SELECT * FROM kadai06_db_table WHERE id=:id';
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$status = $stmt->execute();

if($status == false){
  sql_error($stmt);
} else {
  $row = $stmt->fetch();
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="css/style.css">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
  <title>書籍編集</title>
</head>
<body>
    <!-- ヘッダー -->
    <?php include("header.php"); ?>


<h1>書籍編集</h1>
  <form method="post" action="update.php">
    <input type="hidden" name="id" value="<?= $row['id'] ?>">
    書籍名: <input type="text" name="book_title" value="<?= htmlspecialchars($row['book_title']) ?>"><br>
    書籍URL: <input type="text" name="book_url" value="<?= htmlspecialchars($row['book_url']) ?>"><br>
    コメント: <input type="text" name="comment" value="<?= htmlspecialchars($row['comment']) ?>"><br>
    <button type="submit">更新</button>
  </form>
</body>
</html>
