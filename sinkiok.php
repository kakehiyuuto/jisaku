<?php
session_start();
require_once("config/config.php");
require_once("model/User.php");

try {
  $user = new User($host,$dbname,$user,$pass);
  $user->connectDb();

  if ($_POST) {
    $user->add($_POST);
  }
  }
catch (PDOException $e) { // PDOExceptionをキャッチする
  print "エラー!: " . $e->getMessage() . "<br/gt;";
}

 ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>新規登録完了</title>
  <link rel="stylesheet" type="text/css" href="css/sinkiok.css">
</head>
<body>
  <p>登録完了しました</p>
  <a href="login.php"><p>ログインページへ</p></a>
</body>
</html>
