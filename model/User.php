<?php
require_once("DB.php");


class User extends DB{

  //ログイン
  public function login($arr){
    $sql = "SELECT * FROM users WHERE user_name = :user_name AND password = :password";
    $stmt = $this->connect->prepare($sql);
    $params = array(":user_name"=>$arr['user_name'],":password"=>$arr['password']);
    $stmt->execute($params);
    //$result = $stmt->rowcount();
    $result = $stmt->fetch();
    return $result;
  }

  //参照
  public function findAll(){
  $sql ='SELECT * FROM users';
  $stmt = $this->connect->prepare($sql);
  $stmt->execute();
  $result = $stmt->fetchAll();
  return $result;
  }
  //UserクラスにDBクラスを継承してそこに処理を作った

  //参照（条件付き）
  public function findByID($id){
    $sql = "SELECT * FROM users WHERE id = :id";
    $stmt = $this->connect->prepare($sql);
    $params = array(":id"=>$id);
    $stmt->execute($params);
    $result = $stmt->fetch();
    return $result;
  }

  //参照（条件付き）
  public function findBynew(){
    $sql = "SELECT * FROM music WHERE music_ID <=9";
    $stmt = $this->connect->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll();
    return $result;
  }

  //登録 insert
  public function add($arr){
    $sql = "INSERT INTO users (user_name,password,role) VALUES(:user_name,:password,:role)";
    $stmt = $this->connect->prepare($sql);
    $params = array(
      ':user_name'=>$arr['user_name'],
      ':password'=>$arr['password'],//md5()で暗号化
      ':role'=>0
    );
    $stmt->execute($params);
  }

  //編集　update
  public function edit($arr){
    $sql = "UPDATE users SET user_name = :user_name,password = :password WHERE id = :id";
    $stmt = $this->connect->prepare($sql);
    $params = array(
      ':id'=>$arr['id'],
      ':user_name'=>$arr['user_name'],
      ':password'=>$arr['password']//md5()で暗号化
    );
    $stmt->execute($params);
  }

  //削除
  public function delete($id = null){
    if (isset($id)) {
      $sql = "DELETE FROM users WHERE id = :id";
      $stmt = $this->connect->prepare($sql);
      $params = array(":id"=>$id);
      //$params = array(':id'=>$arr['id']);
      $stmt->execute($params);
    }
  }



  //入力チェック　validate
  public function validate($arr){
    $message = array();

    //ユーザー名
    if (empty($arr['user_name'])) {
      $message['user_name'] = 'ユーザー名を入力してください';
    }
    //メールアドレス
    if (empty($arr['email'])) {
      $message['email'] = 'メールアドレスを入力してください';
    }
    else {
      if (!filter_var($arr['email'], FILTER_VALIDATE_EMAIL)) {
        $message['email'] = 'メールアドレスが正しくありません';
      }
    }
    //パスワード
    if (empty($arr['password'])) {
      $message['password'] = 'パスワードを入力してください';
    }

    return $message;
  }
}
