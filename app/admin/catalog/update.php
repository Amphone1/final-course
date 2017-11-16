<?php session_start(); ?>
<?php require_once "../../../db/mysql.php"; ?>
<?php require_once "../../helper/catalogs-helper.php"; ?>
<?php
  if(isset($_POST["id"]) && isset($_POST["name"]) && isset($_POST["description"])){
    $id = $_POST["id"];
    $name = $_POST["name"];
    $description = $_POST["description"];

    $sql = "update catalogs set name='$name',description ='$description' where id=$id";
    $result = $conn->query($sql);
    if($result){
      $_SESSION["flash"] = "Updated success";
    }else{
      $_SESSION["flash"] = "Error: ".$sql."<br>".$conn->error;
    }

    header("location: index.php");
  }
?>
