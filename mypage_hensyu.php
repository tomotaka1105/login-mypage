<?Php
mb_internal_encoding("utf8");

if(empty($_POST['from_mypage'])) {
  header("Location:login_error.php");
}

//セッションスタート
session_start();
?>

<!DOCTYPE HTML>
<html lang="ja">
  <head>
    <meta charset="UTF-8">
    <title>マイページ登録</title>
    <link rel="stylesheet" type="text/css" href="mypage_hensyu.css">
  </head>
  <body>
    <header>
      <img src="4eachblog_logo.jpg">
      <div class="logout"><a href="log_out.php">ログアウト</a></div>
    </header>
    <main>
      <div class="mypage_edit_contents">
        <h2>会員情報</h2>
        <div class="hello">
          <?php echo "こんにちは！ ".$_SESSION['name']."さん" ?>
        </div>
        <form action="mypage_update.php" method="post">
          <div class="picture">
            <img src="<?php echo $_SESSION['picture']; ?>">
          </div>
          <div class="edit_info">
            <p>氏名 : 
              <input type="text" size="30" value="<?php echo $_SESSION['name']; ?>" name="name">
            </p>
            <p>メール : 
              <input type="text" size="30" value="<?php echo $_SESSION['mail']; ?>" name="mail">
            </p>
            <p>パスワード : 
              <input type="text" size="30" value="<?php echo $_SESSION['password']; ?>" name="password">
            </p>
          </div>
          <div class="comments">
            <textarea cols="70" rows="5" value="<?php echo $_SESSION['comments']; ?>" name="comments"></textarea>
          </div>
          <div class="edit">
            <input type="submit" class="edit_button" value="この内容に登録する" href="http://localhost/login_mypage/mypage_update.php"></input>
          </div>
        </form>
      </div>
    </main>
    <footer>
      ©2018 InterNous.inc. All rights reserved
    </footer>
  </body>

</html>