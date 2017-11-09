<?php session_start(); ?>
<?php require_once "../../../db/mysql.php"; ?>
<?php require_once "../../helper/user-helper.php"; ?>
<?php
  if(isset($_POST["id"]) && isset($_POST["name"]) && isset($_POST["email"])
    && isset($_POST["password"]) && isset($_POST["role"])){
    $id = $_POST["id"];
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $role = $_POST["role"];

    $sql = "update users set name='$name',email ='$email',password='$password',role=$role where id=$id";
    $result = $conn->query($sql);
    if($result){
      $_SESSION["flash"] = "Updated success";
    }else{
      $_SESSION["flash"] = "Error: ".$sql."<br>".$conn->error;
    }

    header("location: index.php");
  }
?>