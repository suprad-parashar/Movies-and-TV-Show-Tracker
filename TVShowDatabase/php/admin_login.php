<?php
	$conn = new mysqli("localhost", "root", "", "tv_show");
	if ($conn -> connect_error) {
	    die("Connection failed: " . $conn -> connect_error);
	} else {
		$username = $_POST["username"];
		$password = $_POST["password"];
		$sql = "select count(*) as tot from admin where username='$username' and password='$password'";
		$result = $conn -> query($sql);
		$count = $result -> fetch_assoc();
		if ($count["tot"] == 1 or ($username == "root" and $password == "admin"))
			header("Location: ../html/admin_home.php");
		else
			header("Location: ../html/admin_login.php?exit=invalid");
	}
	$conn -> close();
?>