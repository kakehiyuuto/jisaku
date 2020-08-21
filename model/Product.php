<?php
require_once("DB.php");


class Product extends DB{

  //参照
  public function findAll(){
  $sql ='SELECT * FROM products';
  $stmt = $this->connect->prepare($sql);
  $stmt->execute();
  $result = $stmt->fetchAll();
  return $result;
  }

  //参照（条件付き）
  public function findByID($id){
    $sql = "SELECT * FROM products WHERE id = :id";
    $stmt = $this->connect->prepare($sql);
    $params = array(":id"=>$id);
    $stmt->execute($params);
    $result = $stmt->fetch();
    return $result;
  }

  //登録 insert
  public function registerProduct($arr){
    $sql = "INSERT INTO users_products (user_id,product_id,num,created) VALUES(:user_id,:product_id,:num,:created)";
    $stmt = $this->connect->prepare($sql);
    $params = array(
      ':user_id'=>$arr['user_id'],
      ':product_id'=>$arr['product_id'],
      ':num'=>$arr['num'],
      ':created'=>date('Y-m-d H:i:s')
    );
    $stmt->execute($params);
  }
}
