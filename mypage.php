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

  //削除処理
  if (isset($_GET['del'])) {
    $user->delete($_GET['del']);
  }

  }
catch (PDOException $e) { // PDOExceptionをキャッチする
  print "エラー!: " . $e->getMessage() . "<br/gt;";
}
print_r($_SESSION);
// var_dump($user_name);
// var_dump($password);
// var_dump($id);



 ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>マイページ</title>
   <link rel="stylesheet" type="text/css" href="css/mypage.css">
   <script language="JavaScript">
     // function check(){
     //   if(window.confirm('<?php echo $id; ?>削除してよろしいですか？')){
     //     return true; // 「OK」時は送信を実行
     //   }
     //   else{ // 「キャンセル」時の処理
     //     return false; // 送信を中止
     //   }
     // }
   </script>
</head>
<body>
  <div id = "mypage">
    <p><?php echo $user_name; ?>さんのページ</p>
  </div>

  <div id = "name">
    <p>ユーザー名<?php echo $user_name; ?>さん</p>
  </div>

  <div id = "pass">
    <p>パスワード<?php echo $password; ?></p>
  </div>

  <a href="re.php"><p>編集</p></a>
  <!-- <form action="delete.php" method="post" onSubmit="return check()">
    <input type="hidden" name="delete" value="delete">
    <input type="hidden" name="id" value="<?php echo $id;?>">
    <input type="submit" value="削除">
  </form> -->
  <a href="?del=<?=$id?>" onclick="if(!confirm('<?php echo $user_name; ?>さんを削除しますがよろしいですか？')) return false;">アカウント退会</a>
  <div id = "buyh">
    <p>購入履歴</p>
  </div>



  <a href="index.php"><p>トップ画面に戻る</p></a>
  <a href="login.php"><p>ログイン画面に戻る</p></a>


</body>
</html>
