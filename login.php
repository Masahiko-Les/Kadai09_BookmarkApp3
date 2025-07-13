<!-- login.php -->
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8"><title>ログイン</title>
  <link rel="stylesheet" href="css/style.css">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">  
</head>
<body>
    <!-- ヘッダー -->
    <?php include("header.php"); ?>


    <div class="login-container">
      <h1>ログイン</h1>
      <form method="POST" action="login_act.php">
        <label for="lid">ログインID</label>
        <input type="text" name="lid" id="lid">

        <label for="lpw">パスワード</label>
        <input type="password" name="lpw" id="lpw">

        <input type="submit" value="ログイン">
      </form>
    <div class="logout-link">
      ログアウトは <a href="logout.php">こちら</a>
    </div>


    </div>


</body>
</html>
