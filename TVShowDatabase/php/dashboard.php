<?php
	$conn = new mysqli("localhost", "root", "", "tv_show");
	if ($conn -> connect_error)
		die("Connection failed: " . $conn -> connect_error);
	if (isset($_POST["remove"])){
		$sql = "delete from user_watchlist where username='".$_POST["user"]."' and show_id='".$_POST["id"]."'";
		$conn -> query($sql);
		header("Location: ../html/home.php?user=".$_POST["user"]);
	} elseif (isset($_POST["rate"])) {
		die("Edit Rating");
	} else {
		if (isset($_POST["stop"]))
			$status = 2;
		else
			$status = 1;
		$sql = "insert into user_watchlist values('".$_POST["user"]."', '".$_POST["id"]."', '$status', '-1')";
		$conn -> query($sql);
		header("Location: ../html/home.php?user=".$_POST["user"]);
	}
?>