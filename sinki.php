<?php
session_start();
require_once("config/config.php");
require_once("model/User.php");

try {
  $user = new User($host,$dbname,$user,$pass);
  $user->connectDb();
}
catch (PDOException $e) { // PDOExceptionをキャッチする
  print "エラー!: " . $e->getMessage() . "<br/gt;";
}

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>新規登録画面</title>
  <link rel="stylesheet" type="text/css" href="css/sinki.css">
</head>
<body>
  <div id ="sinki">
    <h1>新規登録</h1>
  </div><!--sinki-->

  <div id="flip">
    <form id="sinki_form"  name="dd" action="sinkiok.php" method="post" onSubmit="return check()">
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
  <div id="to">
    <button type="button" onclick="history.back()">戻る</button>
    <input type="submit" value="登録">
  </div><!--to-->
</form><!--sinki_form-->
  </div><!-- flip -->
</body>
</html>
