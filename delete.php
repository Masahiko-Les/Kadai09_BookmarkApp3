<?php
session_start();
require_once('funcs.php');
loginCheck();

// GETデータ取得
$id = $_GET['id'];

// DB接続
$pdo = db_conn();

// DELETE
$sql = 'DELETE FROM kadai06_db_table WHERE id=:id';
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$status = $stmt->execute();

if($status == false){
  sql_error($stmt);
} else {
  redirect('select.php');
}
?>
