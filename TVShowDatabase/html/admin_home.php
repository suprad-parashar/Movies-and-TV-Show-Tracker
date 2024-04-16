<!DOCTYPE html>
<html>
<head>
	<title>TV Show Database</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../css/admin_home.css">
	<link rel="stylesheet" type="text/css" href="../css/navigation.css">
</head>
<body>
	<div id="mySidenav" class="sidenav">
	  <a href="admin_home.php" class="active">Users</a>
	  <a href="admin_catalog.php">Catalog</a>
	  <a href="login.php">Logout</a>
	</div>

	<div id="main">
		<table id="user_list">
			<tr>
				<th>First Name</th>
				<th>Last Name</th>
				<th>Email</th>
				<th>Admin Status</th>
			</tr>
			<?php
				$conn = new mysqli("localhost", "root", "", "tv_show");
				if ($conn -> connect_error)
				    die("Connection failed: " . $conn -> connect_error);
				else {
					$sql = "select first_name, last_name, email, is_admin from users order by first_name";
					$result = $conn -> query($sql);
					if ($result -> num_rows > 0) {
						while ($row = $result -> fetch_assoc()) {
							$admin = $row["is_admin"];
							if ($admin == 0)
								echo "<tr><td>".$row["first_name"]."</td><td>".$row["last_name"]."</td><td>".$row["email"]."</td><td><form action='../php/admin_status.php' method='post'><input type='hidden' name='email' value='".$row["email"]."'><input type='submit' name='make_admin' value='Make Admin'></form></td></tr>";
							else
								echo "<tr><td>".$row["first_name"]."</td><td>".$row["last_name"]."</td><td>".$row["email"]."</td><td><form action='../php/admin_status.php' method='post'><input type='hidden' name='email' value='".$row["email"]."'><input type='submit' name='revoke_admin' value='Remove as Admin'></form></td></tr>";
						}
						echo "</table>";
					}
				}
				$conn -> close();
			?>
		</table>
	</div>
</body>
</html>