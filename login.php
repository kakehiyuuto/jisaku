<?php
session_start();
require_once("config/config.php");
require_once("model/User.php");

try {
  $user = new User($host,$dbname,$user,$pass);
  $user->connectDb();

  if ($_POST) {
    $result = $user->login($_POST);
    $_SESSION['User'] =$result;
    if (!empty($result)) {
      $_SESSION['User'] =$result;
      header('Location: /jisaku/index.php');
      exit;
    }
    else {
      $message =  "ログインできませんでした";
    }
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
  <title>ログイン画面</title>
  <link rel="stylesheet" type="text/css" href="css/login.css">
</head>
<body>
  <div id ="login">
    <h1>楽曲購入サイト</h1>
    <h2>ログイン画面</h2>

  </div><!--login-->

  <div id="flip">
    <form id="login_form"  name="dd" action="" method="post" onSubmit="return check()">
      <table>
        <tr>
  	       <th>ユーザー名<span class="red"></span> </th>
  	        <td> <input type="text" size="40" name="user_name"></td>
        </tr><!--1行目-->
        <tr>
  	       <th>パスワード<span class="red"></span></th>
  	        <td> <input type="password" size="40" name="password"></td>
        </tr><!--2行目-->
      </table>
  <div id="so">
    <input type="submit" value="ログイン">
  </div><!--so-->
  </form><!--login_form-->
  </div><!-- flip -->


  <div id="sinki">
  <a href="sinki.php"><p>新規登録へ</p></a>
</div><!--sinki-->
<div id="nou">
<?php if (isset($message)) echo "<p class='error'>".$message."</p>"; ?>
</div>
</body>
</html>
