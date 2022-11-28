<?php
mb_internal_encoding("utf8");
session_start();

if(empty($_SESSION['id'])) {
  try{
    //try catch文、DBに接続できなければエラーメッセージを表示
    $pdo=new PDO("mysql:dbname=lesson01;host=localhost;","root","");
  }catch(PODException $e){
    die("<p>申し訳ございません。現在サーバーが込み合っており一時的にアクセスができません<br>しばらくしてから再度ログインをしてください。</p>
    <a href='http://localhost/login_mypage/login.php'>ログイン画面へ</a>"
    );
  }

  //プリペアードステートメントでSQLの型を作る
  $stmt = $pdo->prepare("select * from login_mypage where mail = ? && password = ?");

  //bindValueを使用し、実際にwhere句に何を入れるかを記述
  $stmt->bindValue(1,$_POST["mail"]);
  $stmt->bindValue(2,$_POST["password"]);

  //executeでクエリを実施。
  $stmt->execute();
  //データベースを切断
  $pdo = NULL;

  //fetch・while文でデータを取得し、sessionに代入
  while ($row = $stmt->fetch()) {
    $_SESSION['id']=$row['id'];
    $_SESSION['name']=$row['name'];
    $_SESSION['mail']=$row['mail'];
    $_SESSION['password']=$row['password'];
    $_SESSION['picture']=$row['picture'];
    $_SESSION['comments']=$row['comments'];
  }

  //データ取得できずに(emptyを使用して判定)sessionが無ければ、リダイレクト(エラー画面へ)
  if(empty($_SESSION['id'])){
    header("Location:login_error.php");
  }

    if(!empty($_SESSION['login_keep'])){
      $_SESSION['login_keep']=$_POST['login_keep'];
    }
}

if(!empty($_SESSION['id']) && !empty($_SESSION['login_keep'])) {
  setcookie('mail',$_SESSION['mail'],time()+60*60*24*7);
  setcookie('password',$_SESSION['password'],time()+60*60*24*7);
  setcookie('login_keep',$_SESSION['login_keep'],time()+60*60*24*7);
} else if(empty($_SESSION['login_keep'])) {
  setcookie('mail','',time()-1);
  setcookie('password','',time()-1);
  setcookie('login_keep','',time()-1);
}
?>

<!DOCTYPE HTML>
<html lang="ja">
  <head>
    <meta charset="UTF-8">
    <title>マイページ画面</title>
    <link rel="stylesheet" type="text/css" href="mypage.css">
  </head>

  <body>
    <header>
      <img src="4eachblog_logo.jpg">
      <div class="logout"><a href="log_out.php">ログアウト</a></div>
    </header>
    <main class="mypage_contents">
      <h2>会員情報</h2>
      <div class="hello">
        <?php echo "こんにちは！ ".$_SESSION['name']."さん" ?>
      </div>
      <div class="profile_picture">
        <img src="<?php echo $_SESSION['picture']; ?>">
      </div>
      <div class="mypage_info">
        <p>氏名 : <?php echo $_SESSION['name']; ?></p>
        <p>メール : <?php echo $_SESSION['mail']; ?></p>
        <p>パスワード : <?php echo $_SESSION['password']; ?></p>
      </div>
      <div class="comments">
        <?php echo $_SESSION['comments']; ?>
      </div>
      <form action="mypage_hensyu.php" method="post" class="edit">
        <input type="submit" class="edit_button" value="編集する" href="http://localhost/login_mypage/mypage_hensyu.php"></input>
      </div>
    </main>
    <footer>
      ©2018 InterNous.inc. All rights reserved
    </footer>
  </body>
</html>