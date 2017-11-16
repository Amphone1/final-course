<?php session_start(); ?>
<?php require_once "../../../db/mysql.php"; ?>
<?php require_once "../../helper/catalogs-helper.php"; ?>
<?php
  if(isset($_POST["name"]) && isset($_POST["description"])){
    $name = $_POST["name"];
    $description = $_POST["description"];

    if(validate($name, $description)){
      $sql = "insert into catalogs(name,description) values('$name','$description')";
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
