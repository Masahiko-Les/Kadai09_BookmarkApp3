<?php
//エラー探し
ini_set('display_errors', 1);
error_reporting(E_ALL);

//セッションスタート！
session_start();

//データをログインページから受け取る
$lid = $_POST["lid"];
$lpw = $_POST["lpw"];

//DB接続
require_once("funcs.php");
$pdo = db_conn();

$stmt = $pdo->prepare("SELECT * FROM user_table WHERE lid = :lid AND life_flg = 0");
$stmt->bindValue(':lid', $lid);
//※パスワードはハッシュ化するため、bindValueで直接バインドしない
$status = $stmt->execute();

//SQL実行エラー時はSTOP
if($status==false){
  sql_error($stmt);
}

//抽出データを取得（fetch=取ってくる）
$val = $stmt->fetch();

//該当レコードがあれば、$valにデータが入る
if( $val && password_verify($lpw, $val["lpw"]) ){
  $_SESSION["chk_ssid"] = session_id();
  $_SESSION["kanri_flg"] = $val["kanri_flg"];
  $_SESSION["name"] = $val["name"];
  $_SESSION["lid"] = $val["lid"]; 
  redirect("index.php");
  // echo "LOGIN SUCCESS";
}else{
    redirect("login.php");
    // echo "LOGIN ERROR";
}
