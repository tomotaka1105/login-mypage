<?php
session_start();
if(isset($_SESSION['id'])){
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
      <form method="post" action="mypage.php" class="login_contents">
        <div class="mail">
          <label>メールアドレス<br></label>
          <input type="text" class="formbox" size="40" value="<?php if(isset($_COOKIE['login_keep'])) {
                                                                       echo $_COOKIE['mail'];
                                                                       }
                                                              ?>" name="mail">
        </div>
        <div class="password">
          <label>パスワード<br></label>
          <input type="password" class="formbox" size="40" value="<?php 
                                                                  if(isset($_COOKIE['login_keep'])) {
                                                                    echo $_COOKIE['password'];
                                                                  }
                                                                    ?>"  name="password">
        </div>
        <p class="center"><input type="checkbox" size="40" name="login_keep" value="login_keep"
        <?php 
            if(isset($_COOKIE['login_keep'])) {
               echo "checked='checked'";
            }
        ?>>ログイン状態を保持する</p>
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
