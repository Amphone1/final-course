<?php session_start(); ?>
<!DOCTYPE html>
<html>
  <head>
    <title>Tao moi user</title>
    <link rel="stylesheet" type="text/css" href="../../../public/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../../../public/css/customer.css">
  </head>
  <body>
  <div class="wrapper">
    <form method="post" action="create.php">
      <div class="row">
        <i class="flash"><?php if(isset($_SESSION["flash"])) echo $_SESSION["flash"]; ?></i>
      </div>
      <div>
        <h3>Tao moi nguoi dung</h3>
      </div>
      <div class="row">
        <label>Ten nguoi dung:</label>
        <input class="form-control" type="text" name="name">
      </div>
      <div class="row">
        <label>Email:</label>
        <input class="form-control"  type="email" name="email">
      </div>
      <div class="row">
        <label>Mat khau:</label>
        <input class="form-control"  type="password" name="password">
      </div>
      <div class="row">
        <label>Lap lai mat khau:</label>
        <input class="form-control"  type="password" name="repassword">
      </div>
      <div class="row">
        <label>Quyen:</label>
        <select class="form-control" name="role">
          <option value="2">User</option>
          <option value="1">Editor</option>
          <option value="0">Admin</option>
        </select>
      </div>
      <br>
      <div class="row">
        <button class="btn btn-primary">Submit</button>
      </div>
    </form>
  </div>
  </body>
</html>
<?php unset($_SESSION["flash"]); ?>