<?php
session_staart();
if(isset($_SESSION['id'])) {
    header("Location:mypage.php");
}
?>

<!DOCTYPE HTML>
<html lang="ja">
  <head>
    <meta charset="UTF-8">
    <title>ログイン画面</title>
    <link rel="stylesheet" type="text/css" href="login.css">
  </head>
  <body>
    <header>
      <img src="4eachblog_logo.jpg">
      <div class="login"><a href="login.php">ログイン</a></div>
    </header>
    <main>
      <p class="error_message">メールアドレスまたはパスワードが間違えています。</p>
      <form method="post" action="mypage.php" class="login_contents">
        <div class="mail">
          <label>メールアドレス<br></label>
          <input type="text" class="formbox" size="40" name="mail">
        </div>
        <div class="password">
          <label>パスワード<br></label>
          <input type="password" class="formbox" size="40" name="password">
        </div>
        <p class="center"><input type="checkbox" size="40" name="login_keep" value="login_keep">ログイン状態を保持する</p>
        <div class="center">
          <input type="submit" class="submit_button" size="35" value="ログイン">
        </div>
      </form>
    </main>
    <footer>
      ©2018 InterNous.inc. All rights reserved
    </footer>
  </body>
</html>