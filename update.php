<?php
session_start();
require_once('funcs.php');
loginCheck();        // ← これが動いているか確認

// POSTデータ取得
$id = $_POST['id'];
$book_title = $_POST['book_title'];
$book_url = $_POST['book_url'];
$comment = $_POST['comment'];

// DB接続
$pdo = db_conn();

// UPDATE
$sql = 'UPDATE kadai06_db_table SET book_title=:book_title, book_url=:book_url, comment=:comment, date=NOW() WHERE id=:id';
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':book_title', $book_title, PDO::PARAM_STR);
$stmt->bindValue(':book_url', $book_url, PDO::PARAM_STR);
$stmt->bindValue(':comment', $comment, PDO::PARAM_STR);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$status = $stmt->execute();

if($status == false){
  sql_error($stmt);
} else {
  redirect('select.php');
}
?>
