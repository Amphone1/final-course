<?php
  function validate($email,$password){
    if(trim($email) == "" || trim($password) == ""){
      $_SESSION["flash"] = "Email or Password can not empty";
      return false;
    }
    $sql = "select * from users where email='$email'";
    GLOBAL $conn;
    $result = $conn->query($sql);
    if($result->num_rows > 0){
      $_SESSION["flash"] = "Email was existed.";
      return false;
    }
    return true;
  }
?>