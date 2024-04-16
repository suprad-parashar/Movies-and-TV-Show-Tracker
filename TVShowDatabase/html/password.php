<!DOCTYPE html>
<html>
<head>
	<title>TV Show Database</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../css/navigation.css">
</head>
<body>
	<?php
		$conn = new mysqli("localhost", "root", "", "tv_show");
		if ($conn -> connect_error)
	    	die("Connection failed: " . $conn -> connect_error);
	    $user = $_GET["user"];
	?>
	<script type="text/javascript" src="../js/navigation.js"></script>
	<div id="mySidenav" class="sidenav">
	  <a href="home.php?user=<?php echo $_GET['user'] ?>">Dashboard</a>
	  <a href="catalog.php?user=<?php echo $_GET['user'] ?>">Catalog</a>
	  <a href="profile.php?user=<?php echo $_GET['user'] ?>" class="active">Profile</a>
	  <a href="login.php">Logout</a>
	</div>

	<div id="main">
		<form action="../php/profile.php" method="post">
			<input type="hidden" name="user" value="<?php echo $user ?>">
			<input type="password" class="text_fields" name="old_pass" placeholder="Old Password" required>
			<?php
				if (isset($_GET["exit"]) && $_GET["exit"] == "incorrect")
					echo "<span style='color: #FFFFFF; background-color: #FF0000;' class='error'>Please enter your correct password</span>";
			?>
			<br>
			<input type="password" class="text_fields" name="new_pass" placeholder="New Password" required>
			<br>
			<input type="submit" name="save_password" value="Save">
			<a href="profile.php?user=<?php echo $_GET['user'] ?>"><input type="button" name="cancel" value="Cancel"></a>
		</form>
	</div>
</body>
</html>