<?php
	$conn = new mysqli("localhost", "root", "", "tv_show");
	if ($conn -> connect_error) {
	    header("Location: ../html/admin_catalog.php?status=fail");
	} else {
		$id = $_GET["id"];
		$sql = "select * from shows where id='$id'";
		$result = $conn -> query($sql);
		$row = $result -> fetch_assoc();
		$title = $row["title"];
		$desc = $row["synopsis"];
		$nos = $row["seasons"];
		$noe = $row["episodes"];
		$air = $row["air_date"];
		$genre = $row["genre"];
		$lang = $row["lang"];
		$status = $row["status"];
		$enddate = $row["end_date"];
		$channel = $row["channel"];
		header("Location: ../html/show_edit.php?id=$id&title=$title&desc=$desc&nos=$nos&noe=$noe&air=$air&genre=$genre&lang=$lang&status=$status&end=$enddate&channel=$channel");
	}
?>