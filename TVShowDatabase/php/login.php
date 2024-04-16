<?php
	$conn = new mysqli("localhost", "root", "", "tv_show");
	if ($conn -> connect_error) {
	    die("Connection failed: " . $conn -> connect_error);
	} else {
		$username = $_POST["username"];
		$password = $_POST["password"];
		// $sql = "select count(*) as tot from users where username='$username' and password='$password'";
		$sql = "call access('$username', '$password')";
		$result = $conn -> query($sql);
		$count = $result -> fetch_assoc();
		if ($count["tot"] == 1)
			header("Location: ../html/home.php?user=$username");
		else
			header("Location: ../html/login.php?exit=invalid&user=$username");
	}
	$conn -> close();
?>