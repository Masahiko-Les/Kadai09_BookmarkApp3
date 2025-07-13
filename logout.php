<?php
session_start();
$_SESSION = array();             // セッション変数を空に
session_destroy();               // セッションを完全に破棄

require_once('funcs.php');
redirect("login.php");  // ログインページにリダイレクト

