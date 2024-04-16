<!DOCTYPE html>
<html>
<head>
	<title>TV Show Database</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../css/navigation.css">
	<link rel="stylesheet" type="text/css" href="../css/dashboard.css">
</head>
<body>
	<script type="text/javascript" src="../js/navigation.js"></script>
	<script type="text/javascript" src="../js/rating.js"></script>
	<div id="mySidenav" class="sidenav">
	  <a href="home.php?user=<?php echo $_GET['user'] ?>" class="active">Dashboard</a>
	  <a href="catalog.php?user=<?php echo $_GET['user'] ?>">Catalog</a>
	  <a href="profile.php?user=<?php echo $_GET['user'] ?>">Profile</a>
	  <a href="login.php">Logout</a>
	</div>

	<div id="main">
		<h3>Currently Watching(<?php 
			$conn = new mysqli("localhost", "root", "", "tv_show");
			if ($conn -> connect_error)
				die("Connection failed: " . $conn -> connect_error);
			$sql = "select count(*) as tot from user_watchlist where username='".$_GET["user"]."' and status=1";
			$result = $conn -> query($sql);
			$row = $result -> fetch_assoc();
			echo $row["tot"];
		?>)</h3>
		<br>
			<table>
				<tr>
					<th>Show Name</th>
					<th>Options</th>
				</tr>
				<?php 
					$conn = new mysqli("localhost", "root", "", "tv_show");
					if ($conn -> connect_error)
	    				die("Connection failed: " . $conn -> connect_error);
	    			$sql = "select id, title from shows where id in (select show_id from user_watchlist where username='".$_GET["user"]."' and status=1)";
	    			$result = $conn -> query($sql);
	    			while ($row = $result -> fetch_assoc())
	    				echo "<tr><td><a href='show_details.php?id=".$row["id"]."&user=".$_GET["user"]."'>".$row["title"]."</td><td>"."<form action='../php/home.php' method='post'><input type='hidden' name='user' value='".$_GET["user"]."'><input type='hidden' name='id' value='".$row["id"]."'><input type='submit' name='stop' value='Completed Watching'><input type='submit' name='remove' value='Remove Show'></form>"."</td></tr>";
	    			$conn -> close();
				?>
			</table>
		<br>
		<h3>Finished Watching(<?php 
			$conn = new mysqli("localhost", "root", "", "tv_show");
			if ($conn -> connect_error)
				die("Connection failed: " . $conn -> connect_error);
			$sql = "select count(*) as tot from user_watchlist where username='".$_GET["user"]."' and status=2";
			$result = $conn -> query($sql);
			$row = $result -> fetch_assoc();
			echo $row["tot"];
		?>)</h3>
		<br>
		<table>
			<tr>
				<th>Show Name</th>
				<th>Rating</th>
				<th>Options</th>
			</tr>
			<?php 
				$conn = new mysqli("localhost", "root", "", "tv_show");
				if ($conn -> connect_error)
					die("Connection failed: " . $conn -> connect_error);
				$sql = "select title, id from shows where id in (select show_id from user_watchlist where username='".$_GET["user"]."' and status=2)";
				$result1 = $conn -> query($sql);
				while ($row1 = $result1 -> fetch_assoc()) {
					$sql = "select rating from user_watchlist where username='".$_GET["user"]."' and show_id='".$row1["id"]."'";
					$result = $conn -> query($sql);
					$row = $result -> fetch_assoc();
					echo "<tr><td><a href='show_details.php?id=".$row1["id"]."&user=".$_GET["user"]."'>".$row1["title"]."</a></td><td><form action='../php/home.php' method='post'><input type='number' value='".$row["rating"]."' min='1' max='5' name='rating'></td><td>"."<input type='hidden' name='user' value='".$_GET["user"]."'><input type='hidden' name='id' value='".$row1["id"]."'><input type='submit' name='rate' value='Save Rating'><input type='submit' name='remove' value='Remove Show'></form>"."</td></tr>";
				}
				$conn -> close();
			?>
		</table>
		<?php if (isset($_GET["status"]) && $_GET["status"] == "editSuccess") echo "<span>Rating Changed Successfully</span>"; ?>
		<br>
		<h3>Not Started Yet(<?php 
			$conn = new mysqli("localhost", "root", "", "tv_show");
			if ($conn -> connect_error)
				die("Connection failed: " . $conn -> connect_error);
			$sql = "select count(*) as tot from user_watchlist where username='".$_GET["user"]."' and status=0";
			$result = $conn -> query($sql);
			$row = $result -> fetch_assoc();
			echo $row["tot"];
		?>)</h3>
		<br>
			<table>
				<tr>
					<th>Show Name</th>
					<th>Options</th>
				</tr>
				<?php 
					$conn = new mysqli("localhost", "root", "", "tv_show");
					if ($conn -> connect_error)
	    				die("Connection failed: " . $conn -> connect_error);
	    			$sql = "select id, title from shows where id in (select show_id from user_watchlist where username='".$_GET["user"]."' and status=0)";
	    			$result = $conn -> query($sql);
	    			while ($row = $result -> fetch_assoc())
	    				echo "<tr><td><a href='show_details.php?id=".$row["id"]."&user=".$_GET["user"]."'>".$row["title"]."</td><td>"."<form action='../php/home.php' method='post'><input type='hidden' name='user' value='".$_GET["user"]."'><input type='hidden' name='id' value='".$row["id"]."'><input type='submit' name='start' value='Start Watching'><input type='submit' name='stop' value='Completed Watching'><input type='submit' name='remove' value='Remove Show'></form>"."</td></tr>";
	    			$conn -> close();
				?>
			</table>
		<br>
	</div>
</body>
</html>