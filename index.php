<?php
session_start();
require_once("config/config.php");
require_once("model/User.php");

//ログアウト処理
if (isset($_GET['logout'])) {
  $_SESSION = array();
}

//ログイン画面を経由しているか確認する
if (!isset($_SESSION['User'])) {
  header('Location: /jisaku/login.php');
  exit;
}

try {
  $user = new User($host,$dbname,$user,$pass);
  $user->connectDb();
  $result = $user->findBynew();


  if ($_SESSION) {
      $user_name = $_SESSION["User"]["user_name"];
      $password = $_SESSION["User"]["password"];
    }
  }
catch (PDOException $e) { // PDOExceptionをキャッチする
  print "エラー!: " . $e->getMessage() . "<br/gt;";
}
// print_r($_SESSION);
//var_dump($user_name);
//var_dump($password);
//print_r($result);
//var_dump($result);

 ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>トップページ</title>
  <link rel="stylesheet" type="text/css" href="css/base.css">
</head>
<section id = "header">
  <h1><img class="logo" src="img/toplogo.png"></h1>
    <!-- <a href="kago.php">
    <img class="kago" src="img/kago.png">
  </a> -->
  <h2></h2>
  <a href="?logout=1"><p>ログアウト<p></a>
    <div class="A1">
    <a href="mypage.php"><p>マイページへ</p></a>
  </div>
  <h2></h2>
  <a><p><?php echo $user_name; ?>さんようこそ</p></a>
</section><!--header-->


<section id="search">
    <div class="search_menu">
      <p>検索</p>
    </div><!--search_menu-->

    <div id="search_area">
      <div class="F2box">
      <a href="MNsearch.php"><img class="F2" src="img/search2.png"></a>
      <ul>
        <p>楽曲検索</p>
        <p1>楽曲の名前で検索</p1>
      </ul>
    </div><!--F2box-->

      <div class="F3box">
        <img class="F3" src="img/search3.png">
        <ul>
          <p>イベントで検索</p>
          <p1>ライブやフェスから検索</p1>
        </ul>
      </div><!--F3box-->
    </div><!--service_area-->

    <div id="new">
      <p>新しく追加された楽曲</p>
    </div><!--new-->

    <div id=new_music>
      <table>
        <tr>
          <td>曲名</td>
          <td>値段</td>
        </tr>

      <?php foreach((array)$result as $row): ?>

        <tr>
          <td><?=$row["music_name"]?></td>
          <td><?=$row["yen"]?>円</td>

          <td>
            <a href="buy_history.php?id=<?=$row['id']?>">購入する</a>
          </td>
        </tr>

      <?php endforeach; ?>
      </table>
    </div><!--new_music-->

  <div id="fes">
    <img src="img/fes1.png">
    <p>ライジングフェスはこちらから</p>
    <img src="img/fes2.png">
    <p>夏フェスはこちらから</p>
    <img src="img/fes3.png">
    <p>旅祭りフェスはこちらから</p>
  </div><!--IM-->
</section><!--search-->
<body>
</body>
</html>
