<?php
require_once('funcs.php');

// DB接続
$pdo = db_conn();

// SELECT
$sql = 'SELECT * FROM kadai06_db_table ORDER BY date DESC';
$stmt = $pdo->prepare($sql);
$status = $stmt->execute();

// エラーチェック
if($status == false){
  sql_error($stmt);
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>書籍一覧</title>
  <link rel="stylesheet" href="css/style.css">
      <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body>

<!-- ヘッダー読み込み -->
<?php include("header.php"); ?>

<h1>登録書籍一覧</h1>
<div class="select-wrapper">
<?php while($r = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
  <div class="bookmark-item">
    <h2><?= htmlspecialchars($r["book_title"]) ?></h2>
    <p><a href="<?= htmlspecialchars($r["book_url"]) ?>" target="_blank">🔗 書籍リンク</a></p>
    <p><?= nl2br(htmlspecialchars($r["comment"])) ?></p>
    <div class="bookmark-actions">
      <a href="detail.php?id=<?= $r["id"] ?>">✏️ 編集</a>
        <?php if (isset($_SESSION["kanri_flg"]) && $_SESSION["kanri_flg"] == 1): ?>   <!--issetは存在しているかを見る。これがないと未ログイン時にエラーが出る  -->
          <a href="delete.php?id=<?= $r["id"] ?>">🗑️ 削除</a>
        <?php endif; ?>
    </div>
  </div>
<?php endwhile; ?>
</div>

</body>
</html>
