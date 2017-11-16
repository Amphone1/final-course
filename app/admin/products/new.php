<?php session_start(); ?>
<?php require_once "../../../db/mysql.php"; ?>
<!DOCTYPE html>
<html>
  <head>
    <title>Tao moi user</title>
    <link rel="stylesheet" type="text/css" href="../../../public/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../../../public/css/custom.css">
  </head>
  <body>
  <div class="wrapper">
    <form method="post" action="create.php">
      <div class="row">
        <i class="flash"><?php if(isset($_SESSION["flash"])) echo $_SESSION["flash"]; ?></i>
      </div>
      <div>
        <h1>Ten san pham</h1>
      </div>
      <div class="row">
        <label>Ten san pham:</label>
        <input class="form-control" type="text" name="name">
      </div>
      <div class="row">
        <label>Anh san pham:</label>
        <input class="form-control"  type="text" name="image">
      </div>
      <div class="row">
        <label>Mo ta san pham:</label>
        <textarea class="form-control" name="description"></textarea>
      </div>
      <div class="row">
        <label>So luong:</label>
        <input class="form-control"  type="text" name="qty">
      </div>
      <div class="row">
        <label>Gia moi san pham:</label>
        <input class="form-control"  type="text" name="price">
      </div>
      <div class="row">
        <label>Danh muc:</label>
        <select class="form-control" name="catalog_id">
          <?php
            $sql = "select * from catalogs";
            $result = $conn->query($sql);
            if($result->num_rows > 0){
              while($row = $result->fetch_assoc()){ ?>
                  <option value="<?php echo $row['id']; ?>"><?php echo $row["name"]; ?></option>
          <?php    }
            }
          ?>
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