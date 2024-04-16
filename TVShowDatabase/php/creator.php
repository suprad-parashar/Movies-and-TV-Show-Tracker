<?php
	$conn = new mysqli("localhost", "root", "", "tv_show");
	if ($conn -> connect_error) {
	    header("Location: ../html/admin_catalog.php?status=fail");
	} else {
		if (isset($_POST["remove"])) {
			$id = $_POST["id"];
			$sql = "delete from creators where id='$id'";
			$result = $conn -> query($sql);
			header("Location: ../html/admin_catalog.php?status=del");
		} else {
			$first_name = $_POST["creator_first_name"];
			$last_name = $_POST["creator_last_name"];
			$sql = "insert into creators(first_name, last_name) values('$first_name', '$last_name')";
			$result = $conn -> query($sql);
			header("Location: ../html/admin_catalog.php?status=success");
		}
	}
	$conn -> close();
?>