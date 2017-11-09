<?php require_once "../../../db/mysql.php"; ?>
<!DOCTYPE html>
<html>
<head>
  <title>Danh sach nguoi dung</title>
   <link rel="stylesheet" type="text/css" href="../../../public/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../../../public/css/customer.css">
</head>
<body>
  <div class="container">
  <h2>Danh sach nguoi dung</h2>
  <table class="table">
    <thead>
      <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Role</th>
        <th>#</th>
        <th>#</th>
      </tr>
    </thead>
    <tbody>
    <?php
      $sql = "select * from users";
      $result = $conn->query($sql);
      if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) { ?>
        <tr>
          <td><?php echo $row['name']; ?></td>
          <td><?php echo $row['email']; ?></td>
          <td><?php switch ($row['role']) {
            case 0:
              echo "Admin";
              break;
            case 1:
              echo "Editor";
              break;
            case 2:
              echo "User";
              break;
          }; ?>            
          </td>
          <td><a href="edit.php?id=<?php echo $row["id"];?>">Edit</a></td>
          <td><a href="delete.php?id=<?php echo $row["id"];?>">Delete</a></td>
        </tr>
    <?php  }
    }
     ?>       
    </tbody>
  </table>
</div>
</body>
</html>