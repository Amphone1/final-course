<?php session_start(); ?>
<?php require_once "../../../db/mysql.php"; ?>
<?php require_once "../../helper/products-helper.php"; ?>
<?php
  if(isset($_POST["name"]) && isset($_POST["description"]) )
    {
    $catalog_id = $_POST["catalog_id"];
    $name = $_POST["name"];
    $description = $_POST["description"];
    $image = $_POST["image"];
    $qty = $_POST["qty"];
    $price = $_POST["price"];
    $user_id=1;
    if(validate($name, $description)){
      $sql = "insert into products(user_id, catalog_id, name,description,image,qty,price) values($user_id, $catalog_id, '$name','$description','$image',$qty,$price)";
      $result = $conn->query($sql);
      if($result){
        $_SESSION["flash"] = "New record added success";
      }else{
        $_SESSION["flash"] = "Error: ".$sql."<br>".$conn->error;
      }
    }

    header("location: new.php");
  }
?>