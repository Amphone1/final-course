<?php
  function validate($name,$descripson){
    if(trim($name) == "" || trim($descripson) == ""){
      $_SESSION["flash"] = "Name or Descripson can not empty";
      return false;
    }
    $sql = "select * from catalogs where name='$name'";
    GLOBAL $conn;
    $result = $conn->query($sql);
    if($result->num_rows > 0){
      $_SESSION["flash"] = "Name was existed.";
      return false;
    }
    return true;
  }
?>
