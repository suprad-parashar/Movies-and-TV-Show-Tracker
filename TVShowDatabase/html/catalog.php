<!DOCTYPE html>
<html>
<head>
	<title>TV Show Database</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../css/navigation.css">
	<link rel="stylesheet" type="text/css" href="../css/catalog.css">
</head>
<body>
	<script type="text/javascript" src="../js/navigation.js"></script>
	<div id="mySidenav" class="sidenav">
	  <a href="home.php?user=<?php echo $_GET['user'] ?>">Dashboard</a>
	  <a href="catalog.php?user=<?php echo $_GET['user'] ?>" class="active">Catalog</a>
	  <a href="profile.php?user=<?php echo $_GET['user'] ?>">Profile</a>
	  <a href="login.php">Logout</a>
	</div>

	<div id="main">
		<table>
			<tr>
				<th>Title</th>
				<th>Rating</th>
				<th>Options</th>
			</tr>
			<?php
				$conn = new mysqli("localhost", "root", "", "tv_show");
				if ($conn -> connect_error)
					die("Connection failed: " . $conn -> connect_error);
				$sql = "select id, title from shows where id not in (select show_id from user_watchlist where username='".$_GET["user"]."')";
				$result = $conn -> query($sql);
				while ($row = $result -> fetch_assoc()) {
					$sql1 = "select avg(rating) as rat from user_watchlist where show_id='".$row["id"]."'";
					$result1 = $conn -> query($sql1);
					$row1 = $result1 -> fetch_assoc();
					echo "<tr><td><a href='show_details.php?id=".$row["id"]."&user=".$_GET["user"]."'>".$row["title"]."</td><td>".$row1["rat"]."</td><td><form action='../php/catalog.php' method='post'><input type='hidden' name='user' value='".$_GET["user"]."'><input type='hidden' name='id' value='".$row["id"]."'><input type='submit' name='start' value='Start Watching'><input type='submit' name='add' value='Add to Watchlist'></form></td></tr>";
				}
				$conn -> close();
			?>
		</table>
	</div>
</body>
</html>