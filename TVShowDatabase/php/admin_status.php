<?php
	$conn = new mysqli("localhost", "root", "", "tv_show");
	if ($conn -> connect_error)
	    die("Connection failed: " . $conn -> connect_error);
	else {
		if (isset($_POST["make_admin"])) {
			$email = $_POST['email'];
			$update_sql = "update users set is_admin = '1' where email='$email'";
			$conn -> query($update_sql);
			header("Location: ../html/admin_home.php");
		} else {
			$email = $_POST['email'];
			$update_sql = "update users set is_admin = '0' where email='$email'";
			$conn -> query($update_sql);
			header("Location: ../html/admin_home.php");
		}
	}
	$conn -> close();
?>