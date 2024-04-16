<?php
	$conn = new mysqli("localhost", "root", "", "tv_show");
	if ($conn -> connect_error)
		die("Connection failed: " . $conn -> connect_error);
	if (isset($_POST["start"]))
		$status = 1;
	else
		$status = 0;
	$sql = "insert into user_watchlist values('".$_POST["user"]."', '".$_POST["id"]."', '$status', '-1')";
	$conn -> query($sql);
	header("Location: ../html/home.php?user=".$_POST["user"]);
?>