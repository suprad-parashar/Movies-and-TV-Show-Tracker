<?php
	$conn = new mysqli("localhost", "root", "", "tv_show");
	if ($conn -> connect_error) {
	    header("Location: ../html/admin_catalog.php?status=fail");
	} else {
		if (isset($_POST["remove"])) {
			$id = $_POST["id"];
			$sql = "delete from actors where id='$id'";
			$result = $conn -> query($sql);
			header("Location: ../html/admin_catalog.php?status=del");
		} else {
			$first_name = $_POST["actor_first_name"];
			$last_name = $_POST["actor_last_name"];
			$sql = "insert into actors(first_name, last_name) values('$first_name', '$last_name')";
			$result = $conn -> query($sql);
			header("Location: ../html/admin_catalog.php?status=success");
		}
	}
	$conn -> close();
?>