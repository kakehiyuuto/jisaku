<?php
session_start();
require_once("config/config.php");
require_once("model/User.php");

try {
  $user = new User($host,$dbname,$user,$pass);
  $user->connectDb();

  if ($_SESSION) {
      $id = $_SESSION["User"]["id"];
      $user_name = $_SESSION["User"]["user_name"];
      $password = $_SESSION["User"]["password"];
    }
  }
catch (PDOException $e) { // PDOExceptionをキャッチする
  print "エラー!: " . $e->getMessage() . "<br/gt;";
}
print_r($_SESSION);
var_dump($user_name);
var_dump($password);

 ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>編集ページ</title>
   <link rel="stylesheet" type="text/css" href="css/mypage.css">
</head>
<body>
  <div id = "re">
    <p>編集ページ</p>
  </div>

  <form id="hen"  name="dd" action="re2.php" method="post" onSubmit="return check()">
    <p>編集内容</p>

<table>
  <p>
    <input type="hidden" name="id"value="<?php echo $id;?>">
  </p>

  <p>氏名：
    <input type="text" name="user_name"value="<?php echo $user_name;?>">
  </p>
  <p>パスワード：
    <input type="text" name="password"value="<?php echo $password;?>">
  </p>
</table>
     <input type="button" onclick="history.back()" value="N O">
     <input type="submit" value="O K">
  </form><!--hen-->




  <a href="index.php"><p>トップ画面に戻る</p></a>


</body>
</html>
