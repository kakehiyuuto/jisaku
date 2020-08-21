<?php
session_start();
require_once("config/config.php");
require_once("model/User.php");

try {
  $user = new User($host,$dbname,$user,$pass);
  $user->connectDb();
  $result = $user->edit($_POST);
  if ($_SESSION) {
      $id = $_SESSION["User"]["id"];
      $user_name = $_SESSION["User"]["user_name"];
      $password = $_SESSION["User"]["password"];
    }
}
catch (PDOException $e) { // PDOExceptionをキャッチする
    print "エラー!: " . $e->getMessage() . "<br/gt;";
  }

  print_r($_POST);

// if($_POST){
//   $name = $_POST["name"];
//   $kana = $_POST["kana"];
//   $tell = $_POST["tell"];
//   $mail = $_POST["mail"];
//   $textarea = $_POST["textarea"];

// $result = $dbh->prepare("UPDATE con SET`name`=:name,`kana`=:kana,`tell`=:tell,`mail`=:mail,`textarea`=:textarea WHERE id =:id");
//
// $result->execute(array(":name" => $_POST["name"],
//                        ":kana" => $_POST["kana"],
//                        ":tell" => $_POST["tell"],
//                        ":mail" => $_POST["mail"],
//                        ":textarea" => $_POST["textarea"],
//                        ":id" => $_POST["id"]));
// }
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>編集完了</title>
    <link rel="stylesheet" type="text/css" href="css/base.css">
    <link rel="stylesheet" type="text/css" href="css/contact.css">
  <script language="JavaScript">
  </script>
  </head>
  <body>

    <p>編集しました</p>
  <p>
      <a href="login.php">ログイン画面へ</a>
  </p>

  </body>
</html>
