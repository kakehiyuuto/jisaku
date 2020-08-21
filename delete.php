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

    $user->delete();

 }
 catch (PDOException $e) { // PDOExceptionをキャッチする
     print "エラー!: " . $e->getMessage() . "<br/gt;";
   }

print_r($_SESSION);
var_dump($id);

//プリペア実行準備
// $result = $dbh->prepare("DELETE FROM con WHERE id = :id");
// //値を:idバインド
// $result->execute(array(":id" => $_POST["id"]));
 ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>削除完了</title>
    <link rel="stylesheet" type="text/css" href="css/base.css">
    <link rel="stylesheet" type="text/css" href="css/contact.css">
  <script language="JavaScript">
  </script>
  </head>
  <body>
    <p>削除しました</p>
  <p>
      <a href="login.php">ログイン画面へ</a>
  </p>
  </body>
</html>
