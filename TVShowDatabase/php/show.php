<?php
	$conn = new mysqli("localhost", "root", "", "tv_show");
	if ($conn -> connect_error) {
	    header("Location: ../html/admin_catalog.php?status=fail");
	} else {
		if (isset($_POST["remove"])) {
			$id = $_POST["id"];
			$sql = "delete from shows where id='$id'";
			$conn -> query($sql);
			$sql = "delete from show_actors where show_id='$id'";
			$conn -> query($sql);
			$sql = "delete from show_creators where show_id='$id'";
			$conn -> query($sql);
			header("Location: ../html/admin_catalog.php?status=del");
		} elseif (isset($_POST["end"])) {
			$id = $_POST["id"];
			$sql = "update shows set status = '1' where id='$id'";
			$conn -> query($sql);
			header("Location: ../html/admin_catalog.php?status=end");
		} elseif (isset($_POST["update"])) {
			$id = $_GET["id"];
			$title = $_POST["title"];
			$desc = $_POST["desc"];
			$seasons = $_POST["seasons"];
			$episodes = $_POST["episodes"];
			$air_date = $_POST["air_date"];
			$genre = $_POST["genre"];
			$lang = $_POST["lang"];
			$channel = $_POST["channel"];
			if (isset($_POST["status"])) {
				$status = 1;
				$end_date = $_POST["end_date"];
			}
			else {
				$status = 0;
				$end_date = NULL;
			}

			$sql = "update shows set title='$title', synopsis='$desc', seasons='$seasons', episodes='$episodes', air_date='$air_date', genre='$genre', lang='$lang', status='$status', end_date='$end_date', channel='$channel' where id='$id'";
			if (!$conn -> query($sql))
				die(mysqli_error($conn));

			$sql = "delete from show_actors where show_id='$id'";
			$conn -> query($sql);
			$sql_actors = "select id from actors";
			$actors = $conn -> query($sql_actors);
			while ($actor = $actors -> fetch_assoc()) {
				$aid = $actor["id"];
				if (isset($_POST[$aid."_actor"])) {
					$role = $_POST["role_$aid"];
					$roles = explode(',', $role);
					for ($i = 0; $i < count($roles); $i++) {
						$roles[$i] = trim($roles[$i]);
						$sql = "insert into show_actors values('$id', '$aid', '$roles[$i]')";
						$conn -> query($sql);
					}
				}
			}

			$sql = "delete from show_creators where show_id='$id'";
			$conn -> query($sql);
			$sql_creators = "select id from creators";
			$creators = $conn -> query($sql_creators);
			while ($creator = $creators -> fetch_assoc()) {
				$cid = $creator["id"];
				if (isset($_POST[$cid."_creator"])) {
					$sql = "insert into show_creators values('$id', '$cid')";
					$conn -> query($sql);
				}
			}
			header("Location: ../html/admin_catalog.php?status=update");
		} else {
			$title = $_POST["title"];
			$desc = $_POST["desc"];
			$seasons = $_POST["seasons"];
			$episodes = $_POST["episodes"];
			$air_date = $_POST["air_date"];
			$genre = $_POST["genre"];
			$lang = $_POST["lang"];
			$channel = $_POST["channel"];
			if (isset($_POST["status"])) {
				$status = 1;
				$end_date = $_POST["end_date"];
			}
			else {
				$status = 0;
				$end_date = NULL;
			}

			$sql = "select max(id) as tot from shows";
			$result = $conn -> query($sql);
			$row = $result -> fetch_assoc();
			$id = $row["tot"] + 1;

			$sql = "insert into shows values ('$id', '$title', '$desc', '$seasons', '$episodes', '$air_date', '$genre', '$lang', '$status', '$end_date', '$channel')";
			if (!$conn -> query($sql))
				die(mysqli_error($conn));

			$sql_actors = "select id from actors";
			$actors = $conn -> query($sql_actors);
			while ($actor = $actors -> fetch_assoc()) {
				$aid = $actor["id"];
				if (isset($_POST[$aid."_actor"])) {
					$role = $_POST["role_$aid"];
					$roles = explode(',', $role);
					for ($i = 0; $i < count($roles); $i++) {
						$roles[$i] = trim($roles[$i]);
						$sql = "insert into show_actors values('$id', '$aid', '$roles[$i]')";
						$conn -> query($sql);
					}
				}
			}

			$sql_creators = "select id from creators";
			$creators = $conn -> query($sql_creators);
			while ($creator = $creators -> fetch_assoc()) {
				$cid = $creator["id"];
				if (isset($_POST[$cid."_creator"])) {
					$sql = "insert into show_creators values('$id', '$cid')";
					$conn -> query($sql);
				}
			}
			header("Location: ../html/admin_catalog.php?status=success");
		}
	}
	$conn -> close();
?>