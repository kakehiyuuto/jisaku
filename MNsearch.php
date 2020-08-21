<?php
session_start();
require_once("config/config.php");
require_once("model/User.php");


//ログイン画面を経由しているか確認する
if (!isset($_SESSION['User'])) {
  header('Location: /jisaku/login.php');
  exit;
}
try {
  $user = new User($host,$dbname,$user,$pass);
  $user->connectDb();

  if(@$_POST["id"] != "" OR @$_POST["music_name"] != ""){ //IDおよびユーザー名の入力有無を確認
            $stmt = $pdo->("SELECT * FROM music WHERE ID='".$_POST["id"] ."' OR music_name LIKE  '%".$_POST["music_name"]."%')"); //SQL文を実行して、結果を$stmtに代入する。
            $stmt->execute();
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
  <title>音楽検索</title>
   <link rel="stylesheet" type="text/css" href="css/MNsearch.css">
   </script>
</head>
<body>
  <form action="MNsearch.php" method="post">
             ID:<input type="text" name="id"><br>
             曲名:<input type="text" name="music_name"><br>
             <input type="submit" value="検索">
         </form>

       </form>
          <table>
          <tr><th>ID</th><th>曲名</th></tr>
          <!-- ここでPHPのforeachを使って結果をループさせる -->
          <?php foreach ((array)$stmt as $row): ?>
              <tr><td><?php echo $row[0]?></td><td><?php echo $row[1]?></td></tr>
          <?php endforeach; ?>
      </table>

  <a href="index.php"><p>トップ画面に戻る</p></a>


</body>
</html>
