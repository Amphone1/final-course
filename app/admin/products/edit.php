<?php session_start(); ?>
<?php require_once "../../../db/mysql.php"; ?>
<?php
  if(!isset($_GET["id"])){
    $_SESSION["flash"] = "Wrong params";
    header("location: index.php");
  }

  $id = $_GET["id"];
  $sql = "select * from products where id=$id";
  $result = $conn->query($sql);
  $row = $result->fetch_assoc();
  $catalog_id = $row["catalog_id"];
  $name = $row["name"];
  $description = $row["description"];
  $image = $row["image"];
  $qty = $row["qty"];
  $price = $row["price"];
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Tao moi user</title>
    <link rel="stylesheet" type="text/css" href="../../../public/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../../../public/css/custom.css">
  </head>
  <body>
  <div class="wrapper">
    <form method="post" action="update.php">
      <input type="hidden" value="<?php echo $id; ?>" name="id">
      <div class="row">
        <i class="flash"><?php if(isset($_SESSION["flash"])) echo $_SESSION["flash"]; ?></i>
      </div>
      <div>
        <h1>Chinh Sua Nguoi Dung</h1>
      </div>
      <div class="row">
        <label>Danh muc:</label>
        <select class="form-control" name="catalog_id">
          <?php
            $sql = "select * from catalogs";
            $result = $conn->query($sql);
            if($result->num_rows > 0){
              while($row = $result->fetch_assoc()){ ?>
                  <option <?php if($catalog_id == $row['id']) echo 'selected=true'; ?> value="<?php echo $row['id']; ?>"><?php echo $row["name"]; ?></option>
          <?php    }
            }
          ?>
        </select>
      </div>
      <div class="row">
        <label>Ten nguoi dung:</label>
        <input class="form-control" type="text" name="name" value="<?php echo $name; ?>">
      </div>
      <div class="row">
        <label>description:</label>
        <textarea class="form-control" name="description"><?php echo $description; ?></textarea>
      </div>
      <div class="row">
        <label>Anh:</label>
        <input class="form-control" type="text" name="image" value="<?php echo $image; ?>">
      </div>
      <div class="row">
        <label>So luong:</label>
        <input class="form-control" type="text" name="qty" value="<?php echo $qty; ?>">
      </div>
      <div class="row">
        <label>Gia San Pham:</label>
        <input class="form-control" type="text" name="price" value="<?php echo $price; ?>">
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