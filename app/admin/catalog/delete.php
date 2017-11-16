<?php session_start(); ?>
<?php require_once "../../../db/mysql.php"; ?>
<?php
	if (isset($_GET["id"])) {
		$id= $_GET["id"];
		$sql = "delete from catalogs where id = $id";
		$result = $conn->query($sql);
		if ($result) {
			$SESSION["flash"] = "delete succes";
		}else{
			$SESSION["flash"] = "failed delete";
		}
		header("location: index.php");
	}
?>
