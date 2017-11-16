<?php require_once "../../../db/mysql.php"; ?>
<?php
if(isset($_GET["id"])){
  $id = $_GET["id"];
  $sql = "delete from products where id=$id";
  $result= $conn->query($sql);
  if($result){
    $_SESSION["flash"] = "Delete success";

  }else{
    $_SESSION["flash"] = "Failed delete";
  }
  header("location: index.php");
}
?>