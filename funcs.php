<?php
//共通に使う関数を記述
//XSS対応（ echoする場所で使用！それ以外はNG ）

function h($str){
    return htmlspecialchars($str, ENT_QUOTES, "UTF-8");
}

function db_conn(){
    try {
    //ID:'root', Password: xamppは 空白 ''
    // ここはデータベース名！！！テーブル名と違う！！
    $pdo = new PDO('mysql:dbname=●●;charset=utf8;host=●●','●●','●●');// データベース情報！！！！！！
            return $pdo;
    } catch (PDOException $e) {
        exit('DBConnectError:'.$e->getMessage());
    }
}

function sql_error($stmt){
  $error = $stmt->errorInfo();
  exit('SQL Error:'.$error[2]);
}

function redirect($file_name){
  header('Location: ' . $file_name);
  exit();
}

function loginCheck(){
  if( !isset($_SESSION["chk_ssid"]) || $_SESSION["chk_ssid"] != session_id() ){
    
    exit("LOGIN ERROR<br><a href='login.php'>ログイン画面へ</a>");
    
  } else {
    session_regenerate_id(true);
    $_SESSION["chk_ssid"] = session_id();
  }
}




?>