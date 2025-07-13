<?php session_start(); ?>

<header class="header">
  <div class="nav-container">
    <!-- ハンバーガー対応ならここにチェックボックス＋ラベルも追加可能 -->


    <a href="index.php" class="logo">
      <i class="fas fa-book-open"></i> 登録ページ
    </a>

    <a href="select.php" class="nav-link">
      <i class="fas fa-list"></i> 登録書籍一覧
    </a>

    <a href="login.php" class="nav-link">
      <?php
        if (isset($_SESSION["lid"])) {
          echo "<i class='fas fa-unlock-alt'></i> ログイン中：" . htmlspecialchars($_SESSION["lid"]);
        } else {
          echo "<i class='fas fa-lock'></i> 未ログイン";
        }
      ?>
    </a>
  </div>
</header>
